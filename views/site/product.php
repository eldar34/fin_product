<?php

use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="container">
            <div class="row justify-content-center align-items-center h-100">
                
                    <div class="col-6">
                        <form id="productForm" method="post" action="" data-pjax=''>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="inputname" class="col-sm-12 col-form-label">Title:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="no-border form-control border-top-0 border-right-0 border-left-0" id="inputname" placeholder="Title" name="name">
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="inputprice" class="col-sm-12 col-form-label">Price:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="no-border form-control border-top-0 border-right-0 border-left-0" id="inputprice" placeholder="Price" name="price">
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="inputdate_and_time" class="col-sm-12 col-form-label">Date and time:</label>
                                </div>
                                <div class="col-sm-8">
                                    <?=
                                        DateTimePicker::widget([
                                            'name' => 'date_and_time',
                                            'value' => date('d.m.Y H:i:s'),
                                            'options' => ['placeholder' => 'Date and time', 'autocomplete' => "off", 'class'=>'no-border form-control border-top-0 border-right-0 border-left-0', 'id'=>'inputdate_and_time'],
                                            'type' => 1,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd.mm.yyyy hh:ii:ss',
                                            ]
                                        ]);
                                    ?>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>
                                <div class="form-group row flex-row-reverse">
                                    <div class="col-sm-4">
                                        <button type="button" id="addProductButton" class="btn btn-primary btn-sm btn-block float-right" onclick="addProduct()">Add</button>
                                    </div>
                                </div>
                        </form>
                    </div>
            </div>

            <div class="row mt-4 product_table">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price, USD</th>
                            <th scope="col">Date and time</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
            
        </div>

    </div>
    
</div>

<script>

//Ajax
function addProduct() {
        // get form-data
        let newProduct = $('#productForm').serialize();
        $.ajax({
                type: 'POST',
                url: "<?= yii\helpers\Url::toRoute(['/products']); ?>",
                data: newProduct,
                async: false,
                success: function(data) {

                    $("input").removeClass("is-invalid");
                    $('#productForm')[0].reset();
                    $('#addProductButton').blur();
                    getProducts();
                    $('.product_table').css({"visibility": "visible"});

                },
                error: function(data) {

                    $('#addProductButton').blur();

                    for (let key in data.responseJSON) {
                        let current_field = data.responseJSON[key].field;
                        $('#input' + current_field).addClass('is-invalid');
                        $('#input' + current_field).siblings('.invalid-feedback').text(data.responseJSON[key].message);                                      
                    }
                    
                },
            });
    }

function getProducts() {
    $.ajax({
            type: 'GET',
            url: "<?= yii\helpers\Url::toRoute(['/products']); ?>",
            async: false,
            success: function(data) {
                // Clear tbody
                $("table.table-striped > tbody").empty();
                for (let key in data) {
                    let current_index = parseInt(key, 10) + 1;
                    let current_name = data[key].name;
                    let current_price = data[key].price;
                    let current_date = data[key].date_and_time;
                    // Add row to tbody
                    $("table.table-striped > tbody").append("<tr><th>" + current_index + "</th><td>" + current_name + "</td><td>" + current_price + "</td><td>" + current_date + "</td></tr>"); 
                    
                }
            },
            error: function(data) {
                console.log('error');
                
            },
        });
}


</script>

<?php

$js = <<< JS

//validation
$('#inputprice').inputmask("9{1,9}.99");
$("#productForm").validate();



JS;
$this->registerJs($js, $position = yii\web\View::POS_READY, $key = null);
?>
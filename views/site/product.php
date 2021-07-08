<?php

use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="container">
            <div class="row justify-content-center align-items-center h-100">
                
                    <div class="col-6">
                        <form id="productForm" method="post" action="">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="staticTitle" class="col-sm-12 col-form-label">Title:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="no-border form-control border-top-0 border-right-0 border-left-0" id="staticTitle" placeholder="Title" name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="inputPrice" class="col-sm-12 col-form-label">Price:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="no-border form-control border-top-0 border-right-0 border-left-0" id="inputPrice" placeholder="Price" name="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="inputDate" class="col-sm-12 col-form-label">Date and time:</label>
                                </div>
                                <div class="col-sm-8">
                                    <?=
                                        DateTimePicker::widget([
                                            'name' => 'date_and_time',
                                            'value' => date('d-m-Y H:i:s'),
                                            'options' => ['placeholder' => 'Дата начала реализации проекта...', 'autocomplete' => "off", 'class'=>'no-border form-control border-top-0 border-right-0 border-left-0'],
                                            'type' => 1,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'mm.dd.yyyy hh:ii:ss',
                                            ]
                                        ]);
                                    ?>
                                </div>
                            </div>
                                <div class="form-group row flex-row-reverse">
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block float-right">Add</button>
                                    </div>
                                </div>
                        </form>
                    </div>
            </div>
            
        </div>
    </div>
    
</div>

<?php
// mm.dd.yyyy hh:mm:ss
$js = <<< JS

$('#inputPrice').inputmask("9{1,9}.99");


$("#productForm").validate();

JS;
$this->registerJs($js, $position = yii\web\View::POS_READY, $key = null);
?>
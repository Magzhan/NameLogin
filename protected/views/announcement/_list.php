<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'announcement-grid',
	'dataProvider'=>$model,
	//'filter'=>$model,
	'columns'=>array(
		'subject',
		'content',
		'users_id',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{approove}{reject}',
			'buttons'=>array(
				'approove'=>array(
					'label'=>'Approove',
					'url'=>'Yii::app()->createUrl("announcement/approove", array("aid"=>$data->id))',
					'options'=>array(
						'live'=>false,
						'class'=>uniqid(),						
					),
					'click'=>"function(){
							$('#announcements').yiiGridView('update', { data: $(this).serialize()});
							}",
				),
				'reject'=>array(
					'label'=>'Reject',
					'url'=>'Yii::app()->createUrl("announcement/reject", array("aid"=>$data->id))',
					'options'=>array(
						'live'=>false,
						'class'=>uniqid(),
					),
					'click'=>"function(){
							confirm('#announcement-grid',$(this).attr('href'));
							return false;
							}",
				), 
			),
		),
	),
)); ?>

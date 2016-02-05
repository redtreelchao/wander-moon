<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
	<tr>
		<td>
			<div class="erro_div">
				<span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span>
			</div>
		</td>
	</tr>
</table>
<?php endif?>
<script type="text/javascript"
	src="<?php echo $this->_static_public?>/js/jscolor/jscolor.js"></script>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Title');?>：</td>
	</tr>
	<tr>
		<td><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?>
      </td>
	</tr>
	
   
  
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Cover Image');?>：</td>
	</tr>
	<tr>
		<td colspan="2">
			<input name="attach" type="file" id="attach" />
      <?php if ($model->attach_file):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->attach_file?>"
				target="_blank">
				<img style="padding: 5px; border: 1px solid #cccccc;"
					src="<?php echo $this->_baseUrl.'/'. $model->attach_file?>"
					width="50" align="absmiddle" />
			</a>
      <?php endif?>
      <?php if ($model->attach_thumb):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->attach_thumb?>"
				target="_blank">
				<img style="padding: 5px; border: 1px solid #cccccc;"
					src="<?php echo $this->_baseUrl.'/'. $model->attach_thumb?>"
					width="50" align="absmiddle" />
			</a>
      <?php endif?>   
  	</td>
	</tr>

	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Introduce');?>：</td>
	</tr>
	<tr>
		<td><?php echo CHtml::activeTextArea($model,'introduce',array('rows'=>5, 'cols'=>90)); ?></td>
	</tr>
	
	 <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Description');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'content'); ?>
     <?php $this->widget('application.widget.kindeditor.KindEditor',array('id'=>'Post_content'));?>
     </td>
  </tr> 
  
   <tr >
    <td class="tb_title"><?php echo Yii::t('admin','Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden'))); ?></td>
  </tr>
 
 
	<tr class="submit">
    <td colspan="2" >		<input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" />
		</td>
	</tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
<?php $form=$this->endWidget(); ?>

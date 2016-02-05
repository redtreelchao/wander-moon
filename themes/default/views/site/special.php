<?php $this->renderPartial('/layouts/nav2'); ?>

<?php foreach($post as $item): ?>
<div class="post_list special">
	<div class="image" style="margin-top:0px;"><a href="<?php echo $this->createUrl('site/specialDetail',array('id'=>$item['id']));?>"><img src="<?php echo $item['attach_file']; ?>" width="100%;"/></a></div>
    <div class="core" style="height:20px;">
    	<div class="left" style="padding-left:4%;"><a href="<?php echo $this->createUrl('site/specialDetail',array('id'=>$item['id']));?>"><?php echo $item['title']; ?></a>
        </div>
    </div>
    <div class="desc" style="padding:4%;"><?php echo $item['introduce']; ?></div>
</div>
<?php endforeach; ?>

<?php $this->renderPartial('/layouts/buttom_login'); ?>
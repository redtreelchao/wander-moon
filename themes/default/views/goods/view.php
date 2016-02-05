<div class="views">
	<div class="tuijian">
    	<div class="title">推荐理由</div>
        <?php if($goods->ext_1): ?>
        <div class="list"><span>1</span><?php echo $goods->ext_1; ?></div>
		<?php endif; ?>
        <?php if($goods->ext_2): ?>
        <div class="list"><span>2</span><?php echo $goods->ext_2; ?></div>
		<?php endif; ?>
        <?php if($goods->ext_3): ?>
        <div class="list"><span>3</span><?php echo $goods->ext_3; ?></div>
		<?php endif; ?>
        <?php if($goods->ext_4): ?>
        <div class="list"><span>4</span><?php echo $goods->ext_4; ?></div>
		<?php endif; ?>
        <?php if($goods->ext_5): ?>
        <div class="list"><span>5</span><?php echo $goods->ext_5; ?></div>
		<?php endif; ?>
    </div>
    
    <div class="content_title">
    	<div class="cn">图文详情</div>
        <div class="en">Graphic details</div>
    </div>
    <div class="content_body" style="font-family:'Microsoft Yahei'; color:#666">
    	<?php echo $goods->content; ?>
    </div>
    
    <div class="content_title">;
    	<div class="cn">产品咨询</div>
        <div class="en">Product advisory</div>
    </div>
    <div class="content_title2">
    	<div class="con">电话：400-920-8581 或 021-63357992</div>
        <div class="con">QQ群：313721242</div>
    </div>

	<div id="wantbuy">
    <?php if(strtotime($goods->sales_endtime) >= time() ): ?>
    <a href="<?php echo $this->createUrl('goods/buy',array('id'=>$goods->id)) ?>"><button type="button" class="btn btn-danger btn-block">我要订购</button></a>
    
    <?php else: ?>
    <h3 style="text-align:center; color:red; margin-top:20px;">当前活动已期，无法订购!</h3>
    <?php endif; ?>
 	</div>
</div>



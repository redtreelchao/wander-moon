<div class="image"><img src="<?php echo $goods['default_image']; ?>" width="100%;"/></div>
<div class="views2"> 
    <div class="content_title">
    	<div class="cn"><?php echo $goods->goods_name; ?></div>
        <div class="en"><?php echo $goods->goods_name_second; ?></div>
    </div>
    <div class="tuijian">
    	<?php if($goods->ext_zhu): ?>
        <div class="list"><span>住</span><?php echo $goods->ext_zhu; ?></div>
        <?php endif; ?>
        <?php if($goods->ext_xing): ?>
        <div class="list"><span>行</span><?php echo $goods->ext_xing; ?></div>
        <?php endif; ?>
        <?php if($goods->ext_shi): ?>
        <div class="list"><span>食</span><?php echo $goods->ext_shi; ?></div>
        <?php endif; ?>
         <?php if($goods->ext_wan): ?>
        <div class="list"><span>玩</span><?php echo $goods->ext_wan; ?></div>
        <?php endif; ?>
        <?php if($goods->ext_han): ?>
        <div class="list"><span>含</span><?php echo $goods->ext_han; ?></div>
        <?php endif; ?>
        <?php if($goods->ext_zeng): ?>
        <div class="list"><span>赠</span><?php echo $goods->ext_zeng; ?></div>
        <?php endif; ?>
         <?php if($goods->ext_mian): ?>
        <div class="list"><span>免</span><?php echo $goods->ext_mian; ?></div>
        <?php endif; ?>
    </div>
    <div class="view_tab">
    <div class="view_price"><span><a href="" style="color:red;"><?php echo $goodsplan[0]['plan_price'] ; ?></a>起</span></div>
    <a href="<?php echo $this->createUrl('goods/view',array('id'=>$goods->id)) ?>"><div class="view_detail"></div></a>
    <div style="clear:both"></div> 
    </div>
    <hr/>
    <div class="tab_list">
    	<ul>
        	<li id="li_1">使用说明<img src="<?php echo $this->_stylePath;?>/images/jt.jpg"/>&nbsp;&nbsp;&nbsp;|</li>
            <li id="li_2">预定须知<img src="<?php echo $this->_stylePath;?>/images/jt.jpg"/>&nbsp;&nbsp;&nbsp;|</li>
            <li id="li_3">退改规则<img src="<?php echo $this->_stylePath;?>/images/jt.jpg"/>&nbsp;&nbsp;&nbsp;</li>
        </ul>
    </div>
    <div class="tab_desc hide" id="tab_desc_1">
    	<?php echo $goods->help_1; ?>
    </div>
    <div class="tab_desc hide" id="tab_desc_2">
    	<?php echo $goods->help_2; ?>
    </div>
    <div class="tab_desc hide" id="tab_desc_3">
    	<?php echo $goods->help_3; ?>
    </div>
    
</div>
<form name="orderForm" id="orderForm" method="post" action="<?php echo $this->createUrl('orders/index'); ?>" />
<div><img src="<?php echo $this->_stylePath;?>/images/ss1.jpg" width="100%;" height="auto;" /></div>
<?php foreach($goodsplan as $item): ?>
<div class="g_line">
    <?php echo $item->plan_name; ?><span>￥<?php echo $item->plan_price; ?> &nbsp;<input type="radio" name="plan" value="<?php echo $item->id; ?>" />	</span>
    <div class="yuding hide">预定<font color='red' class="num">1</font>份 <span><a href="javascript::void(0);" class="add"><img src="<?php echo $this->_stylePath;?>/images/add.jpg" width="20px;"/></a>&nbsp;&nbsp;&nbsp;<a href="javascript::void(0);" class="del"><img src="<?php echo $this->_stylePath;?>/images/del.jpg" width="20px;"/></a></span>
    <div class="desc"><?php echo $item->plan_desc; ?></div>
    </div>
</div>
<?php endforeach; ?>

<div><img src="<?php echo $this->_stylePath;?>/images/ss2.jpg" width="100%;" height="auto;"/></div>
<div class="f_line">姓&nbsp;&nbsp;&nbsp;名&nbsp;&nbsp;<input type="text" name="realname" /><span>联系人姓名</span></div>
<div class="f_line">手机号&nbsp;&nbsp;<input type="text" name="mobile" /><span>用于接收短信</span></div>

<?php if(Yii::app()->session['is_login']!=1):?>
<div style="height:50px; width:100%"></div>
<div id="bottomhint">
        <p class="box_center2">
             <a href="<?php echo $this->createUrl('user/login'); ?>" class="btn_f1">登录购买</a>
             <a href="<?php echo $this->createUrl('user/join'); ?>" class="btn_f3">注册</a>
         </p>
</div>
<?php else: ?>
<div style="height:50px; width:100%"></div>
<div id="gobuy"><a href="javascript::void(0)" id="order_submit"><div class="total_price"><div id="price"></div></div></a></div>
<?php endif; ?>

<input type="hidden" name="order_num" id="order_num" value="1" />
</form>
<div id="price_one" style="display:none"></div>
<script type="text/javascript">
// 收缩展开效果
$(document).ready(function(){
   $(".tab_list #li_1").toggle(function(){
      $('#tab_desc_1').show();
	  $('#tab_desc_2').hide();
	  $('#tab_desc_3').hide();
   },function(){
	  $('#tab_desc_1').hide();
   });
   
   $(".tab_list #li_2").toggle(function(){
      $('#tab_desc_2').show();
	  $('#tab_desc_1').hide();
	  $('#tab_desc_3').hide();
   },function(){
	  $('#tab_desc_2').hide();
   });
   
   $(".tab_list #li_3").toggle(function(){
      $('#tab_desc_3').show();
	  $('#tab_desc_1').hide();
	  $('#tab_desc_2').hide();
   },function(){
	  $('#tab_desc_3').hide();
   });
   
   //动态展开套餐列表
   $("input[name='plan']").click(function (){ 
		$(".yuding").hide();
		$(this).parent().next("div").show();
		//计算总价
		one_price = $(this).parent("span").text();
		reg = '￥';
		one_price = one_price.replace(reg,'');
		$(".num").html(1);
		$("#price").html(one_price);
		$("#price_one").html(one_price);
	});
   
   //动态增加购买数量,购买最多份数为5份
   $(".add").click(function(){
	   num = $(this).parent().prev(".num").text();
	   num = Number(num) + 1;
	   if(num>5){
			alert("您最多可以选择5份哦！");
			return false;   
	   }
	   $(this).parent().prev(".num").html(num);
	   one_price = $("#price_one").text();
	   total_price = Number(one_price)*num;
	   $("#price").html(total_price);
	   $("#order_num").attr('value',num);
   });
   $(".del").click(function(){
	   num = $(this).parent().prev(".num").text();
	   num = Number(num) - 1;
	   if(num<1){
			alert("不能再少了哦！");
			return false;   
	   }
	   $(this).parent().prev(".num").html(num);
	   one_price = $("#price_one").text();
	   total_price = Number(one_price)*num;
	   $("#price").html(total_price);
	   $("#order_num").attr('value',num);
   });
   
   $("#order_submit").click(function(){
	     var plan = $('input:radio[name="plan"]:checked').val();
		 if(plan==null){
			 alert('请选择需要订购的套餐');
			 return false;
		 }
		 if($('input[name=realname]').val()==''){
   			alert("请输入您的姓名");
   			$('input[name=realname]').focus();
   			return false;
  		 }
		 if($('input[name=mobile]').val()==''){
   			alert("请输入您的手机号码");
   			$('input[name=mobile]').focus();
   			return false;
  		 }
		 if($('input[name=mobile]').val().length !=11){
  			alert('请输入正确的手机号码');
   			$('input[name=mobile]').focus();
   			return false;
  		 }
	  	 $("#orderForm").submit();
   });

	

});


</script>


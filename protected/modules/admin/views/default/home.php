<table class="content_list">
  <thead>
    <tr >
      <td colspan="2" class="tbTitle">系统信息</td>
    </tr>
  </thead> 
  <tr>
    <td >作者博客网站</td>
    <td ><a href="http://www.ruzuojun.com" target="_blank">http://www.ruzuojun.com</a></td>
  </tr>
  <tr>
    <td >操作系统软件</td>
    <td ><?php echo $server['serverOs']?> - <?php echo $server['serverSoft']?></td>
  </tr>
  <tr>
    <td >数据库及大小</td>
    <td ><?php echo $server['mysqlVersion']?> (<?php echo $server['dbsize']?>)</td>
  </tr>
  <tr>
    <td >上传许可</td>
    <td ><?php echo $server['fileupload']?></td>
  </tr>
  <tr>
    <td >PHP环境</td>
    <td >PHP版本:<?php echo $server['phpVersion']?></td>
  </tr>
 
</table>

<table class="content_list">
  <thead>
    <tr >
      <td colspan="2" class="tbTitle">技术支持</td>
    </tr>
  </thead> 
  <tr>
    <td >技术人员</td>
    <td >Ru zuojun (Shanghai of China)</td>
  </tr>
  <tr>
    <td >邮箱</td>
    <td><a href="mailto:ruyi1024@vip.126.com">ruyi1024@vip.126.com</a></td>
  </tr>
  <tr>
    <td >QQ</td>
    <td><a href="tencent://message/?uin=279016421">279016421</a></td>
  </tr>
  
  <tr>
    <td >核心框架</td>
    <td><?php echo Yii::powered(); ?>  Version:<?php echo Yii::getVersion(); ?></td>
  </tr>
  
  <tr>
  	<td >后台程序版本</td>
    <td ><?php echo $this->_cmsVersion;?> <?php echo $this->_cmsRelease;?></td>
  </tr>
  
</table>


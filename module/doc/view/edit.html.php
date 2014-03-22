<?php
/**
 * The edit view of doc module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Jia Fu <fujia@cnezsoft.com>
 * @package     doc
 * @version     $Id: edit.html.php 975 2010-07-29 03:30:25Z jajacn@126.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<script language='javascript'>
var type = '<?php echo $doc->type;?>';
$(document).ready(function()
{
    setType(type);
});
</script>
<div class='container mw-900px'>
  <div id='titlebar'>
    <div class='heading'>
      <span class='prefix'><?php echo html::icon($lang->icons['doc']) . ' #' . $doc->id;?></span>
      <strong><?php echo html::a($this->createLink('doc', 'view', "docID=$doc->id"), $doc->title);?></strong>
      <small class='text-muted'> <?php echo html::icon($lang->icons['edit']) . ' ' . $lang->doc->edit;?></small>
    </div>
  </div>
  <form class='form-condensed' method='post' enctype='multipart/form-data' target='hiddenwin' id='dataform'>
    <table class='table table-form'> 
      <tr>
        <th class='w-80px'><?php echo $lang->doc->module;?></th>
        <td><?php echo html::select('module', $moduleOptionMenu, $doc->module, "class='form-control'");?></td>
      </tr>  
      <tr>
        <th><?php echo $lang->doc->type;?></th>
        <td><?php echo $lang->doc->types[$doc->type];?></td>
      </tr>
      <tr>
        <th><?php echo $lang->doc->title;?></th>
        <td><?php echo html::input('title', $doc->title, "class='form-control'");?></td>
      </tr> 
      <tr>
        <th><?php echo $lang->doc->keywords;?></th>
        <td><?php echo html::input('keywords', $doc->keywords, "class='form-control'");?></td>
      </tr>  
      <tr id='urlBox' class='hidden'>
        <th><?php echo $lang->doc->url;?></th>
        <td><?php echo html::input('url', urldecode($doc->url), "class='form-control'");?></td>
      </tr>  
      <tr id='contentBox' class='hidden'>
        <th><?php echo $lang->doc->content;?></th>
        <td><?php echo html::textarea('content', $doc->content, "class='form-control' rows='8' style='width:90%; height:200px'");?></td>
      </tr>  
      <tr>
        <th><?php echo $lang->doc->digest;?></th>
        <td><?php echo html::textarea('digest', $doc->digest, "class='form-control' rows=3");?></td>
      </tr>  
      <tr>
        <th><?php echo $lang->doc->comment;?></th>
        <td><?php echo html::textarea('comment','', "class='form-control' rows=3");?></td>
      </tr> 
      <tr id='fileBox' class='hidden'>
        <th><?php echo $lang->doc->files;?></th>
        <td><?php echo $this->fetch('file', 'buildform', 'fileCount=2');?></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <?php echo html::submitButton() . html::backButton() . html::hidden('lib', $libID);?>
          <?php echo html::hidden('product', $doc->product) . html::hidden('project', $doc->project);?>
        </td>
      </tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>

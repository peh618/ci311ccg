<?php /* ini sebenarnya helper pada codeigniter atau laravel yang saya gunakan */ if (! function_exists('mapTree')) { /** * Assign high numeric IDs to a config item to force appending. * * @param  array  $array * @return array */ function mapTree($dataset, $parent = 0) { $tree = array(); foreach ($dataset as $id => $node)
{
if ($node->parent_id != $parent) continue;
$node->children = mapTree($dataset, $node->id);
$tree[$id] = $node;
}
 
return $tree;
}
}
if (! function_exists('prepareMenu')) {
function prepareMenu($tree,$level = 0)
{
$data = '
<ul class="sidebar-menu">';
if($level > 0){
$data = '
<ul class="treeview-menu">';
}
 
foreach ($tree as $item)
{
$classTree = (count($item->children) > 0 && $level == 0 )? 'treeview' : '';
$spanTree = '';
if(count($item->children) > 0){
$spanTree = '<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>';
}
if(isset($item->header) && !empty($item->header)){
$data .= '
    <li class="header">'.strtoupper($item->header).'</li>
';
}
 
$data .= '
    <li class="'.$classTree.'"><a href="' . $item->url . '">'.$item->icon.' '. $item->name .$spanTree. '</a>';
 
if (count($item->children) > 0)
{
$data .= prepareMenu($item->children,++$level);
}
$data .= '</li>
';
}
 
$data .= '</ul>
';
 
return $data;
}
}
if (! function_exists('generateMenu')) {
function generateMenu($arr){
return prepareMenu(mapTree($arr));
}
}
/* data yang digunakan, nanti bisa diganti dengan dari database */
$m1 = new \stdClass;
$m1->id = 1;
$m1->parent_id = 0;
$m1->name = 'User Management';
$m1->url = '';
$m1->header = 'Admin Configuration';
$m1->icon = '<i class="fa fa-edit"></i>';
 
$m2 = new \stdClass;
$m2->id = 2;
$m2->parent_id = 0;
$m2->name = 'Billing';
$m2->url = '';
$m2->header = 'Report';
$m2->icon = '<i class="fa fa-table"></i>';
 
$m3 = new \stdClass;
$m3->id = 3;
$m3->parent_id = 1;
$m3->name = 'Role';
$m3->url = 'modules/userManagement/role';
$m3->icon = '<i class="fa fa-book"></i>';
 
$m4 = new \stdClass;
$m4->id = 4;
$m4->parent_id = 1;
$m4->name = 'Permission';
$m4->url = '';
$m4->icon = '<i class="fa fa-envelope"></i>';
 
$m5 = new \stdClass;
$m5->id = 5;
$m5->parent_id = 1;
$m5->name = 'User';
$m5->url = '';
$m5->icon = '<i class="fa fa-user"></i>';
 
$m6 = new \stdClass;
$m6->id = 6;
$m6->parent_id = 2;
$m6->name = 'anak tes3';
$m6->url = '';
$m6->icon = '<i class="fa fa-laptop"></i>';
 
$m7 = new \stdClass;
$m7->id = 7;
$m7->parent_id = 2;
$m7->name = 'anak tes7';
$m7->url = '';
$m7->icon = '<i class="fa fa-circle-o"></i>';
 
$m8 = new \stdClass;
$m8->id = 8;
$m8->parent_id = 6;
$m8->name = 'anak tes2';
$m8->url = '';
$m8->icon = '<i class="fa fa-circle-o"></i>';
 
$m9 = new \stdClass;
$m9->id = 9;
$m9->parent_id = 0;
$m9->name = 'Setting';
$m9->url = '';
$m9->header = 'General';
$m9->icon = '<i class="fa fa-gears"></i>';
$arr = [$m1,$m2,$m9,$m3,$m4,$m5,$m6,$m7,$m8];
echo generateMenu($arr);
?>
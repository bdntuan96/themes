<?php
$tags = \helper\tag::find_tag_by_slug($slug, 'game');
if ($tags == null) {
    load_session()->set('error-refe',  load_url()->current_url());
    load_response()->redirect('/error-404');
}
if ($tags->image == null) {
    $thumb = \helper\options::options_by_key_type('favicon');
} else {
    $thumb = \helper\options::options_by_key_type('base_url') . $tags->image;
}
$title = ucwords($tags->name);
$meta_title = 'Playing Game by Tags : ' . "\"$title\"";
$metadata = json_decode($tag->metadata);
$meta_description = $meta_title;
$meta_keyword = strtolower($title . ', ' . $title . ' games');
$favicon = \helper\image::get_thumbnail($thumb, 60, 60, 'c');
$favicon57 = \helper\image::get_thumbnail($thumb, 57, 57, 'c');
$favicon72 = \helper\image::get_thumbnail($thumb, 72, 72, 'c');
$favicon144 = \helper\image::get_thumbnail($thumb, 144, 144, 'c');
$url = $domain_url . '/tags/' . $tags->slug;
$faceseodata = array(
    'title' => $meta_title,
    'description' => $meta_description,
    'keywords' => $meta_keyword,
    'titlefacebook' => $meta_title,
    'thumbfacebook' => $thumb,
    'urlfacebook' => $url,
    'desfacebook' => $meta_description,
    'favicon' => $favicon,
    'favicon57' => $favicon57,
    'favicon144' => $favicon144,
    'favicon72' => $favicon72,
);
$custom = \helper\themes::get_layout('metadata', $faceseodata);
$data['custom'] = $custom;
$tags_id = $tags->id;
?>
<!DOCTYPE html>
<html lang="en-US">    
    <?php echo \helper\themes::get_layout('header', $data); ?>    
    <body>   
        <div class="p-r clay-a">
            <?php echo \helper\themes::get_layout('menu'); ?>   
            <?php echo \helper\themes::get_layout('game_item', array('tags_id' => $tags_id, 'title'=> $title)); ?>    
            <?php echo \helper\themes::get_layout('footer'); ?>   
        </div>
    </body>
</html>



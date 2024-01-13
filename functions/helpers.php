<?php
function renderUploadsSVG($filename = '')
{
    if ($filename) {
        if (wp_upload_dir()['basedir'] . '/' . $filename['filename']) {
            echo file_get_contents(wp_upload_dir()['basedir'] . '/' . $filename['filename']);
        }
    }
}

function getHomeUrl()
{
    return rtrim(home_url(), '/');
}

function renderAssetsSVG($filename = '')
{
    if ($filename) {
        $path = get_template_directory() . '/assets/images/' . $filename . '.svg';
        if (is_readable($path)) {
            echo file_get_contents($path);
        }
    }
}

function renderBlock($name, $args = [])
{
//    get_template_part('/blocks/' . $name . '/index', $args);
    $slug = '/blocks/' . $name . '/index';
    get_template_part($slug, null, $args);
}

function renderComponent($name, $args = [])
{
    $slug = '/components/' . $name . '/index';
    get_template_part($slug, null, $args);
}

function renderImages($filename)
{
    echo get_theme_file_uri('/assets/images/' . $filename);
}

function returnEmpty()
{
    return '';
}

function echoText($text)
{
  esc_attr_e($text, 'brainwave');
}

function renderReusableBlock($id)
{
    $gblock = get_post($id);
    echo apply_filters('the_content', $gblock->post_content);
}

function renderImageUpload($imageId, $size = 'full')
{
    if ($imageId) {
        $image_html = wp_get_attachment_image($imageId['id'], $size);
        $webp_image_html = apply_filters('webp_image_html', $image_html, $imageId['id']);
        echo $webp_image_html;
    } else { ?>
      <img src="<?php echo $date["image"]['url'] ?? renderImages("text-image.jpg") ?>"
           alt="<?php echo $date["image"]['alt'] ?? 'image'; ?>">
    <?php }
}
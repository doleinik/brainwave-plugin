<?php


function renderUploadsSVG($filename = '')
{
    if ($filename) {
        echo file_get_contents(wp_upload_dir()['basedir'] . '/' . $filename['filename']);
    }
}

function renderAssetsSVG($filename = '')
{
    if ($filename) {
        echo file_get_contents(get_template_directory() . '/assets/images/' . $filename . '.svg');
    }
}

function renderBlock($name)
{
    get_template_part('/blocks/' . $name . '/index');
}

function renderComponent($name)
{
    get_template_part('/components/' . $name . '/index');
}

function renderImages($filename)
{
    echo '/wp-content/themes/' . wp_get_theme() . '/assets/images/' . $filename;
}

function returnEmpty()
{
    return '';
}

function echoText($text)
{
    echo esc_html__($text, 'brainwave');
}

function renderReusableBlock($id){
    $gblock = get_post( $id );
    echo apply_filters( 'the_content', $gblock->post_content );
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


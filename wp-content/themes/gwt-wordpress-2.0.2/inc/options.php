<?php
/**
 * The template for displaying the theme options page.
 *
 * @package gwt_wp
 */
class GOVPH
{
  public $options;

  public function __construct()
  {
    $this->options = get_option('govph_options');
    $this->register_settings_fields();
  }

  public static function add_menu_page()
  {
    add_theme_page('Theme Options', 'Theme Options', 'administrator', 'govph-options', array('GOVPH', 'govph_options_page'),6);
  }

  public function govph_options_page()
  {
  ?>
  <div class="wrap">
    
    <h2>Theme Options Page</h2>
    <form action="options.php" method="post" enctype="multipart/form-data">
      <?php settings_fields('govph_options') ?>
      <?php do_settings_sections(__FILE__); ?>

      <p class="class">
        <input id="submit" name="submit" type="submit" class="button-primary" value="Save Changes">
      </p>
    </form>

  </div>
  <script type="text/javascript">
  jQuery(document).ready(function($){

      var custom_uploader;

      $('.my-color-field').wpColorPicker();
      $('form').find('input#upload_image_button').on('click', function(e){
        e.preventDefault();

        var $this = $(this),
          prevInput = $(this).prev();

        console.log(prevInput);

          if (custom_uploader) {
              custom_uploader.open();
              return;
          }

          custom_uploader = wp.media.frames.file_frame = wp.media({
              title: 'Choose Image',
              button: {
                  text: 'Choose Image'
              },
              multiple: false
          });

          custom_uploader.on('select', function() {
              attachment = custom_uploader.state().get('selection').first().toJSON();
              prevInput.val(attachment.url);
              console.log(prevInput.val());
          });

          custom_uploader.open();

      });
      $('form').find('input#header_image_background_button').on('click', function(e){
        e.preventDefault();

        var $this = $(this),
          prevInput = $(this).prev();

        console.log(prevInput);

          if (custom_uploader) {
              custom_uploader.open();
              return;
          }

          custom_uploader = wp.media.frames.file_frame = wp.media({
              title: 'Choose Image',
              button: {
                  text: 'Choose Image'
              },
              multiple: false
          });

          custom_uploader.on('select', function() {
              attachment = custom_uploader.state().get('selection').first().toJSON();
              prevInput.val(attachment.url);
              console.log(prevInput.val());
          });

          custom_uploader.open();

      });
      $('form').find('input#slider_image_background_button').on('click', function(e){
        e.preventDefault();

        var $this = $(this),
          prevInput = $(this).prev();

        console.log(prevInput);

          if (custom_uploader) {
              custom_uploader.open();
              return;
          }

          custom_uploader = wp.media.frames.file_frame = wp.media({
              title: 'Choose Image',
              button: {
                  text: 'Choose Image'
              },
              multiple: false
          });

          custom_uploader.on('select', function() {
              attachment = custom_uploader.state().get('selection').first().toJSON();
              prevInput.val(attachment.url);
              console.log(prevInput.val());
          });

          custom_uploader.open();

      });
  });
  </script>
  <?php
  }
  
  public function register_settings_fields()
  {
    register_setting('govph_options','govph_options');
    add_settings_section('govph_main_section', '', array($this, 'govph_main_section_cb'), __FILE__);
    add_settings_field('govph_auxmenu', 'Auxiliary Menu', array($this, 'govph_auxmenu'), __FILE__, 'govph_main_section');
    add_settings_field('govph_logo_enable', 'Enable Image Logo', array($this, 'govph_logo_enable'), __FILE__, 'govph_main_section');
    add_settings_field('govph_agency_name', 'Agency Name', array($this, 'govph_agency_name'), __FILE__, 'govph_main_section');
    add_settings_field('govph_agency_tagline', 'Agency Tagline', array($this, 'govph_agency_tagline'), __FILE__, 'govph_main_section');
    add_settings_field('govph_header_font_color', 'Header Font Color', array($this, 'govph_header_font_color'), __FILE__, 'govph_main_section');
    add_settings_field('govph_logo_position', 'Logo Position', array($this, 'govph_logo_position_setting'), __FILE__, 'govph_main_section');
    add_settings_field('govph_logo', 'Image Logo', array($this, 'govph_logo_setting'), __FILE__, 'govph_main_section');
    add_settings_field('govph_headercolor', 'Header Background Color', array($this, 'govph_header_color_setting'), __FILE__, 'govph_main_section');
    add_settings_field('govph_headerimage', 'Header Background Image', array($this, 'govph_header_image_setting'), __FILE__, 'govph_main_section');
    add_settings_field('govph_slidercolor', 'Slider Background Color', array($this, 'govph_slider_color_setting'), __FILE__, 'govph_main_section');
    add_settings_field('govph_sliderimage', 'Slider Background Image', array($this, 'govph_slider_image_setting'), __FILE__, 'govph_main_section');
    add_settings_field('govph_slider_fullwidth', 'Slider Full Width', array($this, 'govph_slider_fullwidth'), __FILE__, 'govph_main_section');
    add_settings_field('govph_anchorcolor', 'Anchor Color Settings', array($this, 'govph_anchor_color_setting'), __FILE__, 'govph_main_section');
    add_settings_field('govph_disable_search', 'Search Enable', array($this, 'govph_disable_search'), __FILE__, 'govph_main_section');
    
    // add govph_breadcrumbs separator and option
    add_settings_field('govph_breadcrumbs_enable', 'Enable Breadcrumbs', array($this, 'govph_breadcrumbs_enable'), __FILE__, 'govph_main_section');
    add_settings_field('govph_breadcrumbs_separator', 'Breadcrumbs Separator', array($this, 'govph_breadcrumbs_separator'), __FILE__, 'govph_main_section');
    add_settings_field('govph_breadcrumbs_show_home', 'Breadcrumb Homepage Link', array($this, 'govph_breadcrumbs_show_home'), __FILE__, 'govph_main_section');
    add_settings_field('govph_breadcrumbs_last_separator', 'Append a separator in last breadcrumb', array($this, 'govph_breadcrumbs_last_separator'), __FILE__, 'govph_main_section');
    add_settings_field('govph_breadcrumbs_last_title', 'Append content title as last breadcrumb item', array($this, 'govph_breadcrumbs_last_title'), __FILE__, 'govph_main_section');

    // accessibility links
    add_settings_field('govph_acc_link_section', '<h3>Accessibility Links<h3>', array($this, 'govph_acc_link_section'), __FILE__, 'govph_main_section');
    add_settings_field('govph_acc_link_statement', 'Accessibility Statement<br/>(Combination + 0)', array($this, 'govph_acc_link_statement'), __FILE__, 'govph_main_section');
    add_settings_field('govph_acc_link_home', 'Home Page<br/>(Combination + 1)', array($this, 'govph_acc_link_home'), __FILE__, 'govph_main_section');
    add_settings_field('govph_acc_link_main_content', 'Main Content<br/>(Combination + R)', array($this, 'govph_acc_link_main_content'), __FILE__, 'govph_main_section');
    add_settings_field('govph_acc_link_contact', 'Contact<br/>(Combination + C)', array($this, 'govph_acc_link_contact'), __FILE__, 'govph_main_section');
    add_settings_field('govph_acc_link_feedback', 'Feedback<br/>(Combination + K)', array($this, 'govph_acc_link_feedback'), __FILE__, 'govph_main_section');
    add_settings_field('govph_acc_link_sitemap', 'Site Map<br/>(Combination + M)', array($this, 'govph_acc_link_sitemap'), __FILE__, 'govph_main_section');
    add_settings_field('govph_acc_link_search', 'Search<br/>(Combination + S)', array($this, 'govph_acc_link_search'), __FILE__, 'govph_main_section');

    // publishing options
    add_settings_field('govph_content_section', '<h3>Pubishing Options<h3>', array($this, 'govph_content_section'), __FILE__, 'govph_main_section');
    add_settings_field('govph_content_show_pub_date', 'Show Published Date', array($this, 'govph_content_show_pub_date'), __FILE__, 'govph_main_section');
    add_settings_field('govph_content_pub_date_lbl', 'Publish Date Label', array($this, 'govph_content_pub_date_lbl'), __FILE__, 'govph_main_section');
    add_settings_field('govph_content_show_author', 'Show Publisher', array($this, 'govph_content_show_author'), __FILE__, 'govph_main_section');
    add_settings_field('govph_content_pub_author_lbl', 'Publish Author Label', array($this, 'govph_content_pub_author_lbl'), __FILE__, 'govph_main_section');
    
    // custom styling
    add_settings_field('govph_custom_styling', '<h3>Theme Styling<h3>', array($this, 'govph_custom_styling'), __FILE__, 'govph_main_section');
    add_settings_field('govph_custom_border_width', 'Border Width', array($this, 'govph_custom_border_width'), __FILE__, 'govph_main_section');
    add_settings_field('govph_custom_border_radius', 'Border Radius', array($this, 'govph_custom_border_radius'), __FILE__, 'govph_main_section');
    add_settings_field('govph_custom_border_color', 'Border Color', array($this, 'govph_custom_border_color'), __FILE__, 'govph_main_section');
    add_settings_field('govph_custom_background_color', 'Background Color', array($this, 'govph_custom_background_color'), __FILE__, 'govph_main_section');
    add_settings_field('govph_custom_headings_text', 'Header Rendering', array($this, 'govph_custom_headings_text'), __FILE__, 'govph_main_section');
    add_settings_field('govph_custom_headings_size', 'Header Font Size', array($this, 'govph_custom_headings_size'), __FILE__, 'govph_main_section');
    add_settings_field('govph_custom_headings_inner_page_size', 'Header Inner Post Font Size', array($this, 'govph_custom_headings_inner_page_size'), __FILE__, 'govph_main_section');
    add_settings_field('govph_custom_footer_background_color', 'Agency Footer Color', array($this, 'govph_custom_footer_background_color'), __FILE__, 'govph_main_section');

  }

  public function govph_main_section_cb() { }

  /*
   * Inputs
   */

  // Main Section
  public function govph_auxmenu()
  {
    $true = ($this->options['govph_auxmenu'] == 'true' ? "checked" : "");
  ?>
    <input type="checkbox" name="govph_options[govph_auxmenu]" value="true" <?php echo $true ?>>
    <span class="description">Check to display Auxiliary Menu</span>
  <?php
  }

  public function govph_logo_position_setting()
  {
    $left = ($this->options['govph_logo_position'] == 'left' ? "checked" : "");
    $center = ($this->options['govph_logo_position'] == 'center' ? "checked" : "");
  ?>
    <input type="radio" name="govph_options[govph_logo_position]" value="left" <?php echo $left ?>> Left <br>
    <input type="radio" name="govph_options[govph_logo_position]" value="center" <?php echo $center ?>> Center
  <?php
  }

  public function govph_logo_setting()
  {
  ?>
    <label for="upload_image">
      <input id="upload_image" type="text" size="36" name="govph_options[govph_logo]" value="<?php echo $this->options['govph_logo']; ?>" />
      <input id="upload_image_button" class="button" type="button" value="Upload Logo" />
      <br/><p class="description">Enter a URL or upload an image</p>
    </label>

  <?php
    if (!empty($this->options['govph_logo'])) {
      echo '<br/><img src="'.$this->options['govph_logo'].'" height="100px" alt="" style="background: #ddd; padding: 10px;">';
    }
  }

  public function govph_logo_enable()
  {
    $logo_enable_option = isset($this->options['govph_logo_enable']) ? $this->options['govph_logo_enable'] : 1;
    $enabled = ($logo_enable_option == 1 ? "checked" : "");
    $disabled = ($logo_enable_option == 0 ? "checked" : "");
  ?>
    <label for="logo_enabled">
      <input type="radio" name="govph_options[govph_logo_enable]" id="govph_logo_enable" value="1" <?php echo $enabled ?>> <label for="govph_logo_enable">Enable</label> <br>
      <input type="radio" name="govph_options[govph_logo_enable]" id="govph_logo_disable" value="0" <?php echo $disabled ?>> <label for="govph_logo_disable">Disable</label>
      <br/><p class="description">If enabled, the website name will be hidden and image logo will be shown (if exists).</p>
    </label>
  <?php
  }

  public function govph_agency_name()
  {
    $value = $this->options['govph_agency_name'] ? $this->options['govph_agency_name'] : '';
  ?>
    <input type="text" name="govph_options[govph_agency_name]" value="<?php echo $value ?>" style="width: 400px;"><br/>
    <p class="description">The agency website name.</p>
  <?php
  }

  public function govph_agency_tagline()
  {
    $value = $this->options['govph_agency_tagline'] ? $this->options['govph_agency_tagline'] : '';
  ?>
    <input type="text" name="govph_options[govph_agency_tagline]" value="<?php echo $value ?>" style="width: 400px;"><br/>
    <p class="description">The agency tagline.</p>
  <?php
  }

  public function govph_header_color_setting()
  {
  ?>
    <input name="govph_options[govph_headercolor]" type="text" value="<?php echo $this->options['govph_headercolor']; ?>" class="my-color-field" data-default-color="#142745" />
  <?php
  }

  public function govph_header_font_color()
  {
    $header_font_color = !empty($this->options['govph_header_font_color']) ? $this->options['govph_header_font_color'] : '#000';
  ?>
    <input name="govph_options[govph_header_font_color]" type="text" value="<?php echo $header_font_color; ?>" class="my-color-field" data-default-color="#000" />
  <?php
  }

  public function govph_header_image_setting()
  {
  ?>
    <label for="header_image_background">
      <input id="header_image_background" type="text" size="36" name="govph_options[govph_headerimage]" value="<?php echo $this->options['govph_headerimage']; ?>" />
      <input id="header_image_background_button" class="button" type="button" value="Upload Image" />
      <br /><p class="description">Enter a URL or upload an image for header background</p>
    </label>
  <?php
    if (!empty($this->options['govph_headerimage'])) {
      echo '<br/><img src="'.$this->options['govph_headerimage'].'" height="100px" style="background: #ddd; padding: 10px;">';
    }
  }

  public function govph_slider_color_setting()
  {
  ?>
    <input name="govph_options[govph_slidercolor]" type="text" value="<?php echo $this->options['govph_slidercolor']; ?>" class="my-color-field" data-default-color="#1f3a70" />
  <?php
  }
  
  public function govph_slider_image_setting()
  {
  ?>
    <label for="slider_image_background">
      <input id="slider_image_background" type="text" size="36" name="govph_options[govph_sliderimage]" value="<?php echo $this->options['govph_sliderimage']; ?>" />
      <input id="slider_image_background_button" class="button" type="button" value="Upload Image" />
      <br/><p class="description">Enter a URL or upload an image for header background</p>
    </label>
  <?php
    if (!empty($this->options['govph_sliderimage'])) {
      echo '<br/><img src="'.$this->options['govph_sliderimage'].'" height="200px" alt="'.$alt.'" style="background: #ddd; padding: 10px;">';
    }
  }

  public function govph_slider_fullwidth()
  {
    $true = ($this->options['govph_slider_fullwidth'] == 'true' ? "checked" : "");
  ?>
    <input type="checkbox" name="govph_options[govph_slider_fullwidth]" value="true" <?php echo $true ?>>
    <span class="description">Check to display the slider in full width</span>
  <?php
  }


  public function govph_anchor_color_setting()
  {
  ?>
    <input name="govph_options[govph_anchorcolor]" type="text" value="<?php echo $this->options['govph_anchorcolor']; ?>" class="my-color-field" data-default-color="#2795b6" />
  <?php
  }


  public function govph_disable_search()
  {
    $true = ($this->options['govph_disable_search'] == 'true' ? "checked" : "");
  ?>
    <input type="checkbox" name="govph_options[govph_disable_search]" value="true" <?php echo $true ?>>
    <span class="description">Check to display search field</span>
  <?php
  }

  public function govph_breadcrumbs_enable()
  {
    $true = ($this->options['govph_breadcrumbs_enable'] == 'true' ? "checked" : "");
  ?>
    <input type="checkbox" name="govph_options[govph_breadcrumbs_enable]" value="true" <?php echo $true ?>>
    <span class="description">Check to display Breadcrumbs</span>
  <?php
  }

  public function govph_breadcrumbs_separator()
  {
    $value = $this->options['govph_breadcrumbs_separator'] ? $this->options['govph_breadcrumbs_separator'] : ' › ';
  ?>
    <input type="text" name="govph_options[govph_breadcrumbs_separator]" value="<?php echo $value ?>"><br/>
    <span class="description">Separator symbol in between breadcrumb links</span>
  <?php
  }

  public function govph_breadcrumbs_show_home()
  {
    $true = ($this->options['govph_breadcrumbs_show_home'] == 'true' ? "checked" : "");
  ?>
    <input type="checkbox" name="govph_options[govph_breadcrumbs_show_home]" value="true" <?php echo $true ?>>
    <span class="description">Check to show homepage link at the start of the breadcrumbs</span>
  <?php
  }

  public function govph_breadcrumbs_last_separator()
  {
    $true = ($this->options['govph_breadcrumbs_last_separator'] == 'true' ? "checked" : "");
  ?>
    <input type="checkbox" name="govph_options[govph_breadcrumbs_last_separator]" value="true" <?php echo $true ?>>
    <span class="description">Append a separator to the end of the breadcrumb</span>
  <?php
  }

  public function govph_breadcrumbs_last_title()
  {
    $true = ($this->options['govph_breadcrumbs_last_title'] == 'true' ? "checked" : "");
  ?>
    <input type="checkbox" name="govph_options[govph_breadcrumbs_last_title]" value="true" <?php echo $true ?>>
    <span class="description">Append the content title to the end of the breadcrumb</span>
  <?php
  }

  /**
   * accessibility theme option
   */
  public function govph_acc_link_section(){
  ?>
    <hr/>
    <label>Shortcut Keys Combination Activation</label>
    <p>Combination keys used for each browser.</p>
    <ul>
      <li>Chrome for Linux press (Alt+Shift+shortcut_key)</li>
      <li>Chrome for Windows press (Alt+shortcut_key)</li>
      <li>For Firefox press (Alt+Shift+shortcut_key)</li>
      <li>For Internet Explorer press (Alt+Shift+shortcut_key) then press (enter)</li>
    </ul>
  <?php
  }

  public function govph_acc_link_statement()
  {
    $value = $this->options['govph_acc_link_statement'] ? $this->options['govph_acc_link_statement'] : '';
  ?>
    <span class="field-prefix"><?php echo get_site_url(); ?>/ </span>
    <input type="text" name="govph_options[govph_acc_link_statement]" value="<?php echo $value ?>"><br/>
    <span class="description">Statement accessibility page</span>
  <?php
  }

  public function govph_acc_link_home()
  {
    $value = $this->options['govph_acc_link_home'] ? $this->options['govph_acc_link_home'] : '';
  ?>
    <span class="field-prefix"><?php echo get_site_url(); ?>/ </span>
    <input type="text" name="govph_options[govph_acc_link_home]" value="<?php echo $value ?>"><br/>
    <span class="description">The home page of the website<br/>Default: blank</span>
  <?php
  }

  public function govph_acc_link_main_content()
  {
    $value = $this->options['govph_acc_link_main_content'] ? $this->options['govph_acc_link_main_content'] : '#main-content';
  ?>
    <span class="field-prefix">{current_url}/ </span>
    <input type="text" name="govph_options[govph_acc_link_main_content]" value="<?php echo $value ?>"><br/>
    <span class="description">Default: #main-content</span>
  <?php
  }

  public function govph_acc_link_contact()
  {
  ?>
    <span class="field-prefix"><?php echo get_site_url(); ?>/ </span>
    <input type="text" name="govph_options[govph_acc_link_contact]" value="<?php echo $this->options['govph_acc_link_contact'] ?>">
  <?php
  }

  public function govph_acc_link_feedback()
  {
  ?>
    <span class="field-prefix"><?php echo get_site_url(); ?>/ </span>
    <input type="text" name="govph_options[govph_acc_link_feedback]" value="<?php echo $this->options['govph_acc_link_feedback'] ?>">
  <?php
  }

  public function govph_acc_link_sitemap()
  {
    $value = $this->options['govph_acc_link_sitemap'] ? $this->options['govph_acc_link_sitemap'] : '#footer';
  ?>
    <span class="field-prefix">{current_url}/ </span>
    <input type="text" name="govph_options[govph_acc_link_sitemap]" value="<?php echo $this->options['govph_acc_link_sitemap'] ?>"><br/>
    <span class="description">Note: If the sitemap is a page, use the full URL of the website: <?php echo get_site_url(); ?>/{sitemap_page}<br/>
      Default: #footer</span>
  <?php
  }

  public function govph_acc_link_search()
  {
  ?>
    <span class="field-prefix"><?php echo get_site_url(); ?>/ </span>
    <input type="text" name="govph_options[govph_acc_link_search]" value="<?php echo $this->options['govph_acc_link_search'] ?>"><br/>
    <span class="description">Note: Create a new page by going to "Pages" and selecting "Add New." Title the page "Search," and choose "Search Page" on Page Attributes from the Template drop-down menu. Click "Publish."<br/>
      The link will be coming from the created page's permalink.
    </span>
  <?php
  }

  /**
   * publishing options
   */
  public function govph_content_section(){
  ?>
    <hr></hr>
  <?php
  }

  public function govph_content_show_pub_date(){
    $true = ($this->options['govph_content_show_pub_date'] == 'true' || !empty($this->options['govph_content_show_pub_date']) ? "checked" : "");
  ?>
    <input type="checkbox" name="govph_options[govph_content_show_pub_date]" value="true" <?php echo $true ?>>
    <span class="description">Check to display the published date on posts</span>
  <?php
  }

  public function govph_content_pub_date_lbl(){
    $default = !empty($this->options['govph_content_pub_date_lbl']) ? $this->options['govph_content_pub_date_lbl'] : 'Posted on';
  ?>
    <input type="text" name="govph_options[govph_content_pub_date_lbl]" value="<?php echo $default ?>"><br/>
    <span class="description">Publish date display label</span>
  <?php
  }

  public function govph_content_show_author(){
    $true = ($this->options['govph_content_show_author'] == 'true' ? "checked" : "");
  ?>
    <input type="checkbox" name="govph_options[govph_content_show_author]" value="true" <?php echo $true ?>>
    <span class="description">Check to display the author</span>
  <?php
  }

  public function govph_content_pub_author_lbl(){
    $default = !empty($this->options['govph_content_pub_author_lbl']) ? $this->options['govph_content_pub_author_lbl'] : '&nbsp;by';
  ?>
    <input type="text" name="govph_options[govph_content_pub_author_lbl]" value="<?php echo $default ?>"><br/>
    <span class="description">Publish author display label<br/>Note: Add a space at the start to add spacing after the date</span>
  <?php
  }

  /**
   * custom styling
   */
  public function govph_custom_styling(){
  ?>
    <hr></hr>
  <?php
  }

  public function govph_custom_border_width()
  { 
    $zero = ($this->options['govph_custom_border_width'] == 0 ? "selected" : "");
    $one = ($this->options['govph_custom_border_width'] == 1 ? "selected" : "");
    $two = ($this->options['govph_custom_border_width'] == 2 ? "selected" : "");
    $three = ($this->options['govph_custom_border_width'] == 3 ? "selected" : "");
    $four = ($this->options['govph_custom_border_width'] == 4 ? "selected" : "");
    $five = ($this->options['govph_custom_border_width'] == 5 ? "selected" : "");
  ?>
    <select name="govph_options[govph_custom_border_width]">
      <option value="">-- Select --</option>
      <option value="0" <?php echo $zero ?>>0px</option>
      <option value="1" <?php echo $one ?>>1px</option>
      <option value="2" <?php echo $two ?>>2px</option>
      <option value="3" <?php echo $three ?>>3px</option>
      <option value="4" <?php echo $four ?>>4px</option>
      <option value="5" <?php echo $five ?>>5px</option>
    </select>
    <br><span class="description">Adjust border width for main content area and widgets</span>
  <?php
  }

  public function govph_custom_border_radius()
  {
    $zero = ($this->options['govph_custom_border_radius'] == 0 ? "selected" : "");
    $two = ($this->options['govph_custom_border_radius'] == 2 ? "selected" : "");
    $four = ($this->options['govph_custom_border_radius'] == 4 ? "selected" : "");
    $six = ($this->options['govph_custom_border_radius'] == 6 ? "selected" : "");
    $eight = ($this->options['govph_custom_border_radius'] == 8 ? "selected" : "");
    $ten = ($this->options['govph_custom_border_radius'] == 10 ? "selected" : "");
    $ztwo = ($this->options['govph_custom_border_radius'] == 12 ? "selected" : "");
    $zfour = ($this->options['govph_custom_border_radius'] == 14 ? "selected" : "");
    $zsix = ($this->options['govph_custom_border_radius'] == 16 ? "selected" : "");
    $zeight = ($this->options['govph_custom_border_radius'] == 18 ? "selected" : "");
    $zten = ($this->options['govph_custom_border_radius'] == 20 ? "selected" : "");
  ?>
    <select name="govph_options[govph_custom_border_radius]">
      <option value="">-- Select --</option>
      <option value="0" <?php echo $zero ?>>0px</option>
      <option value="2" <?php echo $two ?>>2px</option>
      <option value="4" <?php echo $four ?>>4px</option>
      <option value="6" <?php echo $six ?>>6px</option>
      <option value="8" <?php echo $eight ?>>8px</option>
      <option value="10" <?php echo $ten ?>>10px</option>
      <option value="12" <?php echo $ztwo ?>>12px</option>
      <option value="14" <?php echo $zfour ?>>14px</option>
      <option value="16" <?php echo $zsix ?>>16px</option>
      <option value="18" <?php echo $zeight ?>>18px</option>
      <option value="20" <?php echo $zten ?>>20px</option>
    </select>
    <br><span class="description">Adjust border radius for main content area and widgets</span>
  <?php
  }

  public function govph_custom_border_color()
  {
    $govph_custom_border_color = !empty($this->options['govph_custom_border_color']) ? $this->options['govph_custom_border_color'] : '#D8D8D8';
  ?>
    <input name="govph_options[govph_custom_border_color]" type="text" value="<?php echo $this->options['govph_custom_border_color']; ?>" class="my-color-field" data-default-color="#D8D8D8" />
    <br><span class="description">Border color for widgets and main content area</span>
  <?php
  }

  public function govph_custom_background_color()
  {
    $govph_custom_background_color = !empty($this->options['govph_custom_background_color']) ? $this->options['govph_custom_background_color'] : '#F2F2F2';
  ?>
    <input name="govph_options[govph_custom_background_color]" type="text" value="<?php echo $this->options['govph_custom_background_color']; ?>" class="my-color-field" data-default-color="#F2F2F2" />
    <br><span class="description">Background color for widgets and main content area</span>
  <?php
  }

  public function govph_custom_headings_text()
  {
    $nl = ($this->options['govph_custom_headings_text'] == "none" ? "selected" : "");
    $caps = ($this->options['govph_custom_headings_text'] == "uppercase" ? "selected" : "");
  ?>
    <select name="govph_options[govph_custom_headings_text]">
      <option value="">-- Select --</option>
      <option value="none" <?php echo $nl ?>>normal</option>
      <option value="uppercase" <?php echo $caps ?>>all caps</option>
    </select>
    <br><span class="description">Header text rendering</span>
  <?php
  }

  public function govph_custom_headings_size()
  {
    $sm = ($this->options['govph_custom_headings_size'] == 0.8 ? "selected" : "");
    $nl = ($this->options['govph_custom_headings_size'] == 1 ? "selected" : "");
    $lr = ($this->options['govph_custom_headings_size'] == 1.6 ? "selected" : "");
  ?>
    <select name="govph_options[govph_custom_headings_size]">
      <option value="">-- Select --</option>
      <option value="0.8" <?php echo $sm ?>>small</option>
      <option value="1" <?php echo $nl ?>>normal</option>
      <option value="1.6" <?php echo $lr ?>>large</option>
    </select>
    <br><span class="description">Adjust default header font size</span>
  <?php
  }

  public function govph_custom_headings_inner_page_size()
  {
    $sm = ($this->options['govph_custom_headings_inner_page_size'] == 2 ? "selected" : "");
    $nl = ($this->options['govph_custom_headings_inner_page_size'] == 2.69 ? "selected" : "");
    $lr = ($this->options['govph_custom_headings_inner_page_size'] == 3.5 ? "selected" : "");
  ?>
    <select name="govph_options[govph_custom_headings_inner_page_size]">
      <option value="">-- Select --</option>
      <option value="2" <?php echo $sm ?>>small</option>
      <option value="2.69" <?php echo $nl ?>>normal</option>
      <option value="3.5" <?php echo $lr ?>>large</option>
    </select>
    <br><span class="description">Adjust inner post header font size</span>
  <?php
  }

  public function govph_custom_footer_background_color()
  {
    $govph_custom_footer_background_color = !empty($this->options['govph_custom_footer_background_color']) ? $this->options['govph_custom_footer_background_color'] : '#E9E9E9';
  ?>
    <input name="govph_options[govph_custom_footer_background_color]" type="text" value="<?php echo $this->options['govph_custom_footer_background_color']; ?>" class="my-color-field" data-default-color="#E9E9E9" />
    <br><span class="description">Background color for agency footer section</span>
  <?php
  }
}

add_action('admin_menu', 'govph_options_menu');
function govph_options_menu(){
  GOVPH::add_menu_page();
}

add_action('admin_init', 'govph_options_init');
function govph_options_init(){
  new GOVPH();
}

if (is_admin()) { add_action('admin_enqueue_scripts', 'mw_enqueue_color_picker'); }
function mw_enqueue_color_picker( $hook_suffix ) {
  // first check that $hook_suffix is appropriate for your admin page
  wp_enqueue_media();
  wp_enqueue_style('wp-color-picker');
  wp_enqueue_script('my-script-handle', get_template_directory_uri() . '/js/color.js', array('wp-color-picker'), false, true );
}

function govph_displayoptions( $options ){
  echo $option['govph_custom_border_width'];
  $option = get_option('govph_options');

  switch ($options) {
    case 'govph_auxmenu':
      if ($option['govph_auxmenu'] === 'true') {
        // TODO: add template for aux menu
      ?>
      <nav id="auxiliary" class="container-topbar">
        <div class="row">
            <div class="small-12 large-12 columns toplayer">
              <div class="aux-nav-btn-container hide-for-medium-up">
                <button id="aux-nav-btn" data-dropdown="aux-nav">Auxiliary Menu</button>
              </div>
                <nav id="aux-nav" class="nomargin show-for-medium-up" data-dropdown-content>
                  <section class="top-bar-section">
                    <ul>
                      <?php wp_nav_menu( array('theme_location'  => 'aux_nav', 'items_wrap' => '%3$s', 'container' => false, 'walker' => new Topbar_Nav_Menu() )); ?>
                    </ul>
                  </section>
                </nav>
            </div>
        </div>
      </nav>
      <?php
      }
      break;
    case 'govph_logo_enable':
      return (!empty($option['govph_logo_enable']) && $option['govph_logo_enable'] == 1);
      break;
    case 'govph_header_font_color':
      $header_font_color = (!empty($option['govph_header_font_color']) ? 'color:'.$option['govph_header_font_color'].';' : '');
      echo $header_font_color;
      break;
    case 'govph_logo':
      $logo_image = (!empty($option['govph_logo']) ? $option['govph_logo'] : get_template_directory_uri().'/images/logo-masthead-large.png');
      $addLogo = ($option['govph_logo_enable'] == 1) ? '<img src="'.$logo_image.'" />' : 
      '<div>
        <div id="imagelogo"><img alt="'.$option['govph_agency_name'].' Official Logo" src="'.$logo_image.'" height="100px" width="100px"/></div>
        <div id="anamecont">
          <div id="mastrp">Republic of the Philippines</div>
          <div id="aname">'.$option['govph_agency_name'].'</div>
          <div id="atag">'.$option['govph_agency_tagline'].'</div>
        </div>
       </div>' ;
      echo $addLogo;
      break;
    case 'govph_logo_position':
      $logoPos = (!empty($option['govph_logo_position']) ? 'text-align:'.$option['govph_logo_position'].';' : '');
      echo $logoPos;
      break;
    case 'govph_headercolor':
      $headerBg = (!empty($option['govph_headercolor']) ? 'background-color:'.$option['govph_headercolor'].';' : '');
      echo $headerBg;
      break;
    case 'govph_headerimage':
      $headerImg = (!empty($option['govph_headerimage']) ? 'background-image:url("'.$option['govph_headerimage'].'");' : '');
      echo $headerImg;
      break;
    case 'govph_slidercolor':
      $sliderBg = (!empty($option['govph_slidercolor']) ? 'background-color:'.$option['govph_slidercolor'].';' : '');
      echo $sliderBg;
      break;
    case 'govph_sliderimage':
      $sliderImg = (!empty($option['govph_sliderimage']) ? 'background-image:url("'.$option['govph_sliderimage'].'");background-size:cover;' : '');
      echo $sliderImg;
      break;
    case 'govph_anchorcolor':
      $anchorColor = (!empty($option['govph_anchorcolor']) ? 'color:'.$option['govph_anchorcolor'].' !important;' : '');
      echo $anchorColor;
      break;
    case 'govph_disable_search':
      return ($option['govph_disable_search'] ? true : false);
      break;
    // TODO: disable option for widget position, make it dynamic, displays sidebars when atleast one widget is active
    case 'govph_content_position':
      $content_class = 'large-12 medium-12 ';
      if(is_active_sidebar('left-sidebar')){
        $content_class = 'large-8 medium-8 large-push-4 medium-push-4 ';
        if(is_active_sidebar('right-sidebar')){
          $content_class = 'large-6 medium-6 large-push-3 medium-push-3 ';
        }
      }
      elseif(is_active_sidebar('right-sidebar')){
        $content_class = 'large-8 medium-8 ';
      }
      echo $content_class;
      break;
    case 'govph_sidebar_position_left':
      $sidebar_class = '';
      if(is_active_sidebar('left-sidebar')){
        $sidebar_class = 'large-4 medium-4 large-pull-8 medium-pull-8 ';
        if(is_active_sidebar('right-sidebar')){
          $sidebar_class = 'large-3 medium-3 large-pull-6 medium-pull-6 ';
        }
      }
      elseif(is_active_sidebar('right-sidebar')){
        $sidebar_class = 'large-4 medium-4 large-pull-8 medium-pull-8 ';
      }
      echo $sidebar_class;
      break;
    case 'govph_sidebar_position_right':
      $sidebar_class = '';
      if(is_active_sidebar('left-sidebar')){
        $sidebar_class = 'large-4 medium-4 ';
        if(is_active_sidebar('right-sidebar')){
          $sidebar_class = 'large-3 medium-3 ';
        }
      }
      elseif(is_active_sidebar('right-sidebar')){
        $sidebar_class = 'large-4 medium-4 ';
      }
      echo $sidebar_class;
      break;
    case 'govph_sidebar_left':
      get_sidebar('left');
      break;
    case 'govph_sidebar_right':
      get_sidebar('right');
      break;
    case 'govph_panel_top':
      get_sidebar('panel-top');
      break;
    case 'govph_position_panel_top_1':
    case 'govph_position_panel_top_2':
    case 'govph_position_panel_top_3':
    case 'govph_position_panel_top_4':
      $panel_top_1 = '';
      $panel_top_2 = '';
      $panel_top_3 = '';
      $panel_top_4 = '';
      if(is_active_sidebar('panel-top-1')){
        $panel_top_1 = 'large-12 ';
        if(is_active_sidebar('panel-top-2')){
          $panel_top_1 = 'large-6 ';
          $panel_top_2 = 'large-6 ';
          if(is_active_sidebar('panel-top-3')){
            $panel_top_1 = 'large-6 ';
            $panel_top_2 = 'large-3 ';
            $panel_top_3 = 'large-3 ';
            if(is_active_sidebar('panel-top-4')){
              $panel_top_1 = 'large-3 ';
              $panel_top_2 = 'large-3 ';
              $panel_top_3 = 'large-3 ';
              $panel_top_4 = 'large-3 ';
            }
          }
          else{
            $panel_top_3 = '';
            if(is_active_sidebar('panel-top-4')){
              $panel_top_1 = 'large-4 ';
              $panel_top_2 = 'large-4 ';
              $panel_top_4 = 'large-4 ';
            }
          }
        }
        else{
          $panel_top_2 = '';
          if(is_active_sidebar('panel-top-3')){
            $panel_top_1 = 'large-6 ';
            $panel_top_3 = 'large-6 ';
            if(is_active_sidebar('panel-top-4')){
              $panel_top_1 = 'large-4 ';
              $panel_top_3 = 'large-4 ';
              $panel_top_4 = 'large-4 ';
            }
          }
          else{
            $panel_top_3 = '';
            if(is_active_sidebar('panel-top-4')){
              $panel_top_1 = 'large-6 ';
              $panel_top_4 = 'large-6 ';
            }
          }
        }
      }
      else{
        $panel_top_1 = '';
        if(is_active_sidebar('panel-top-2')){
          $panel_top_2 = 'large-12 ';
          if(is_active_sidebar('panel-top-3')){
            $panel_top_2 = 'large-6 ';
            $panel_top_3 = 'large-6 ';
            if(is_active_sidebar('panel-top-4')){
              $panel_top_2 = 'large-3 ';
              $panel_top_3 = 'large-3 ';
              $panel_top_4 = 'large-6 ';
            }
          }
          else{
            $panel_top_3 = '';
            if(is_active_sidebar('panel-top-4')){
              $panel_top_2 = 'large-6 ';
              $panel_top_4 = 'large-6 ';
            }
          }
        }
        else{
          $panel_top_2 = '';
          if(is_active_sidebar('panel-top-3')){
            $panel_top_3 = 'large-12 ';
            if(is_active_sidebar('panel-top-4')){
              $panel_top_3 = 'large-6 ';
              $panel_top_4 = 'large-6 ';
            }
          }
          else{
            $panel_top_3 = '';
            if(is_active_sidebar('panel-top-4')){
              $panel_top_4 = 'large-12 ';
            }
          }
        }
      }

      if($options == 'govph_position_panel_top_1'){
        echo $panel_top_1;
      }
      elseif($options == 'govph_position_panel_top_2'){
        echo $panel_top_2;
      }
      elseif($options == 'govph_position_panel_top_3'){
        echo $panel_top_3;
      }
      elseif($options == 'govph_position_panel_top_4'){
        echo $panel_top_4;
      }
      break;
    case 'govph_panel_bottom':
      get_sidebar('panel-bottom');
      break;
    case 'govph_position_panel_bottom_1':
    case 'govph_position_panel_bottom_2':
    case 'govph_position_panel_bottom_3':
    case 'govph_position_panel_bottom_4':
      $panel_top_1 = '';
      $panel_top_2 = '';
      $panel_top_3 = '';
      $panel_top_4 = '';
      if(is_active_sidebar('panel-bottom-1')){
        $panel_top_1 = 'large-12 ';
        if(is_active_sidebar('panel-bottom-2')){
          $panel_top_1 = 'large-6 ';
          $panel_top_2 = 'large-6 ';
          if(is_active_sidebar('panel-bottom-3')){
            $panel_top_1 = 'large-6 ';
            $panel_top_2 = 'large-3 ';
            $panel_top_3 = 'large-3 ';
            if(is_active_sidebar('panel-bottom-4')){
              $panel_top_1 = 'large-3 ';
              $panel_top_2 = 'large-3 ';
              $panel_top_3 = 'large-3 ';
              $panel_top_4 = 'large-3 ';
            }
          }
          else{
            $panel_top_3 = '';
            if(is_active_sidebar('panel-bottom-4')){
              $panel_top_1 = 'large-4 ';
              $panel_top_2 = 'large-4 ';
              $panel_top_4 = 'large-4 ';
            }
          }
        }
        else{
          $panel_top_2 = '';
          if(is_active_sidebar('panel-bottom-3')){
            $panel_top_1 = 'large-6 ';
            $panel_top_3 = 'large-6 ';
            if(is_active_sidebar('panel-bottom-4')){
              $panel_top_1 = 'large-4 ';
              $panel_top_3 = 'large-4 ';
              $panel_top_4 = 'large-4 ';
            }
          }
          else{
            $panel_top_3 = '';
            if(is_active_sidebar('panel-bottom-4')){
              $panel_top_1 = 'large-6 ';
              $panel_top_4 = 'large-6 ';
            }
          }
        }
      }
      else{
        $panel_top_1 = '';
        if(is_active_sidebar('panel-bottom-2')){
          $panel_top_2 = 'large-12 ';
          if(is_active_sidebar('panel-bottom-3')){
            $panel_top_2 = 'large-6 ';
            $panel_top_3 = 'large-6 ';
            if(is_active_sidebar('panel-bottom-4')){
              $panel_top_2 = 'large-3 ';
              $panel_top_3 = 'large-3 ';
              $panel_top_4 = 'large-6 ';
            }
          }
          else{
            $panel_top_3 = '';
            if(is_active_sidebar('panel-bottom-4')){
              $panel_top_2 = 'large-6 ';
              $panel_top_4 = 'large-6 ';
            }
          }
        }
        else{
          $panel_top_2 = '';
          if(is_active_sidebar('panel-bottom-3')){
            $panel_top_3 = 'large-12 ';
            if(is_active_sidebar('panel-bottom-4')){
              $panel_top_3 = 'large-6 ';
              $panel_top_4 = 'large-6 ';
            }
          }
          else{
            $panel_top_3 = '';
            if(is_active_sidebar('panel-bottom-4')){
              $panel_top_4 = 'large-12 ';
            }
          }
        }
      }

      if($options == 'govph_position_panel_bottom_1'){
        echo $panel_top_1;
      }
      elseif($options == 'govph_position_panel_bottom_2'){
        echo $panel_top_2;
      }
      elseif($options == 'govph_position_panel_bottom_3'){
        echo $panel_top_3;
      }
      elseif($options == 'govph_position_panel_bottom_4'){
        echo $panel_top_4;
      }
      break;
    case 'govph_accessibility_links_front':
      $links = '<ul>';
      $links .= '<li><a href="">Skip to Main Content</a></li>';
      $links .= '</ul>';
      break;
    case 'govph_slider_start':
      if ($option['govph_slider_fullwidth'] != 'true') {
        echo '<div class="row"><div class="large-12 columns">';
      }
      break;
    case 'govph_slider_end':
      if ($option['govph_slider_fullwidth'] != 'true') {
        echo '</div></div>';
      }
      break;
    case 'govph_acc_link_statement':
      if(!empty($option['govph_acc_link_statement'])){
        $value = '';
        $value .= get_site_url().'/'; 
        $value .= $option['govph_acc_link_statement'];
        return $value;
      }
      break;
    case 'govph_acc_link_contact':
      if(!empty($option['govph_acc_link_contact'])){
        $value = '';
        $value .= get_site_url().'/'; 
        $value .= $option['govph_acc_link_contact'];
        return $value;
      }
      break;
    case 'govph_acc_link_feedback':
      if(!empty($option['govph_acc_link_statement'])){
        $value = '';
        $value .= get_site_url().'/'; 
        $value .= $option['govph_acc_link_feedback'];
        return $value;
      }
      break;
    case 'govph_acc_link_search':
      if(!empty($option['govph_acc_link_search'])){
        $value = '';
        $value .= get_site_url().'/'; 
        $value = $option['govph_acc_link_search'];
        return $value;
      }
      break;
    case 'govph_acc_link_home':
      $value = '';
      $value .= get_site_url().'/'; 
      $value .= isset($option['govph_acc_link_home']) ? $option['govph_acc_link_home'] : '';
      return $value;
      break;
    case 'govph_acc_link_main_content':
      $value = '';
      $value .= isset($option['govph_acc_link_main_content']) ? $option['govph_acc_link_main_content'] : '#main-content';
      return $value;
      break;
    case 'govph_acc_link_sitemap':
      $value = '';
      $value = isset($option['govph_acc_link_sitemap']) ? $option['govph_acc_link_sitemap'] : '#footer';
      echo $value;
      break;
    case 'govph_content_show_pub_date':
      return isset($option['govph_content_show_pub_date']) ? $option['govph_content_show_pub_date'] : '';
      break;
    case 'govph_content_pub_date_lbl':
      return isset($option['govph_content_pub_date_lbl']) ? $option['govph_content_pub_date_lbl'] : '';
      break;
    case 'govph_content_show_author':
      return isset($option['govph_content_show_author']) ? $option['govph_content_show_author'] : '';
      break;
    case 'govph_content_pub_author_lbl':
      return isset($option['govph_content_pub_author_lbl']) ? $option['govph_content_pub_author_lbl'] : '';
      break;
    case 'govph_custom_border_width':
      $border = (!empty($option['govph_custom_border_width']) ? 'border-width:'.$option['govph_custom_border_width'].'px ;' : '');
      echo $border;
      break;
    case 'govph_custom_border_radius':
      $border = (!empty($option['govph_custom_border_radius']) ? 'border-radius:'.$option['govph_custom_border_radius'].'px ;' : '');
      echo $border;
      break;
    case 'govph_custom_border_color':
      $border = (!empty($option['govph_custom_border_color']) ? 'border-color:'.$option['govph_custom_border_color'].';' : '');
      echo $border;
      break;
    case 'govph_custom_headings_text':
      $size = (!empty($option['govph_custom_headings_text']) ? 'text-transform:'.$option['govph_custom_headings_text'].';' : '');
      echo $size;
      break;
    case 'govph_custom_headings_size':
      $size = (!empty($option['govph_custom_headings_size']) ? 'font-size:'.$option['govph_custom_headings_size'].'em;' : '');
      echo $size;
      break;
    case 'govph_custom_headings_inner_page_size':
      $size = (!empty($option['govph_custom_headings_inner_page_size']) ? 'font-size:'.$option['govph_custom_headings_inner_page_size'].'em;' : '');
      echo $size;
      break;
    case 'govph_custom_background_color':
      $bg = (!empty($option['govph_custom_background_color']) ? 'background-color:'.$option['govph_custom_background_color'].';' : '');
      echo $bg;
      break;
    case 'govph_custom_footer_background_color':
      $border = (!empty($option['govph_custom_footer_background_color']) ? 'background-color:'.$option['govph_custom_footer_background_color'].';' : '');
      echo $border;
      break;
  }
 }

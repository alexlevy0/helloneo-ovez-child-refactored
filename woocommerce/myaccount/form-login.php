<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="row myaccount-login">

    <div class="col-xs-12 col-sm-6 login-wrap">
      <div class="login-wrap-inner">

        <h3 class="title-login"><?php esc_html_e( 'Login', 'ovez' ); ?></h3>
        <form method="post" class="login">
            <?php do_action( 'woocommerce_login_form_start' ); ?>
            <p class="form-row form-row-wide">
                <label for="username"><?php esc_html_e( 'Username or email address', 'ovez' ); ?> <span class="required">*</span></label>
                <input type="text" class="input-text form-control" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
            </p>
            <p class="form-row form-row-wide">
                <label for="password"><?php esc_html_e( 'Password', 'ovez' ); ?> <span class="required">*</span></label>
                <input class="input-text form-control" type="password" name="password" id="password" />
            </p>

            <?php do_action( 'woocommerce_login_form' ); ?>

            <p class="form-row">
                <?php wp_nonce_field( 'woocommerce-login' ); ?>
                <label for="rememberme" class="inline checkbox-style pull-left">
                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'ovez' ); ?>
                </label>
                <p class="lost_password pull-right">
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'ovez' ); ?></a>
                </p>
                <input type="submit" class="btn btn-variant" name="login" value="<?php esc_attr_e( 'Login', 'ovez' ); ?>" />

            </p>


            <?php do_action( 'woocommerce_login_form_end' ); ?>
        </form>
      </div>
    </div>

    <!--Registration-->



    <div class="col-xs-12 col-sm-6 register-wrap">
      <div class="register-wrap-inner">

        <h3 class="title-register"><?php esc_html_e( 'Register', 'ovez' ); ?></h3>

        <form method="post" class="register">

            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                <p class="form-row form-row-wide">
                    <label for="reg_username"><?php esc_html_e( 'Username', 'ovez' ); ?> <span class="required">*</span></label>
                    <input type="text" class="input-text form-control" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                </p>

            <?php endif; ?>

            <p class="form-row form-row-wide">
                <label for="reg_email"><?php esc_html_e( 'Email address', 'ovez' ); ?> <span class="required">*</span></label>
                <input type="email" class="input-text form-control" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
            </p>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                <p class="form-row form-row-wide">
                    <label for="reg_password"><?php esc_html_e( 'Password', 'ovez' ); ?> <span class="required">*</span></label>
                    <input type="password" class="input-text form-control" name="password" id="reg_password" />
                </p>

            <?php endif; ?>

            <!-- Spam Trap -->
            <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php esc_html_e( 'Anti-spam', 'ovez' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

            <?php do_action( 'woocommerce_register_form' ); ?>
            <?php do_action( 'register_form' ); ?>

            <p class="form-row">
                <?php wp_nonce_field( 'woocommerce-register' ); ?>
                <input type="submit" class="btn btn-variant" name="register" value="<?php esc_attr_e( 'Register', 'ovez' ); ?>" />
            </p>

            <?php do_action( 'woocommerce_register_form_end' ); ?>

        </form>
      </div>

    </div>


</div>


<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

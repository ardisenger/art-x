<?php

/**
 * Виджет отправки формы SMX
 * Class trueTopPostsWidget
 */
class trueTopPostsWidget extends WP_Widget
{
    /**
     * создание виджета
     */
    function __construct()
    {
        parent::__construct(
            'true_top_widget',
            'Получить контент', // заголовок виджета
            array('description' => 'Позволяет получить доступ к контенту при активной подписки') // описание
        );
    }

    /*
     * фронтэнд виджета
     */
    public function widget($args, $instance)
    {
        $dir = esc_url( site_url( 'wp-wp-auth/smx-login.php', 'login_post' ));
        $title = apply_filters('widget_title', $instance['title']); // к заголовку применяем фильтр (необязательно)
        echo '<div class="row">
                <div class="col-md-5 col-sm-5">
                    <h2>Оформление подписки</h2>
                    <div class="custom-heading-subtitle">Для получения доступа к фото и видео введите Ваш номер телефона</div>
                        <form action="'.$dir.'" method="post">
                            <div class="form-group">
                                <div class="form-wrap">
                                    <input type="hidden" name="act" value="login">
                                    <input type="text" name="username" class="form-input" placeholder="+70000000000" required="">
                                </div><br/>                                
                               <button class="btn btn-primary" type="submit">Получить контент</button>
                            </div>
                        </form>
                        <br/> 
                    </div>
                </div>';
    }

    /**
     * бэкэнд виджета
     */
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
        if (isset($instance['posts_per_page'])) {
            $posts_per_page = $instance['posts_per_page'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Заголовок</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    /**
     * сохранение настроек виджета
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

/**
 * регистрация виджета
 */
function true_top_posts_widget_load()
{
    register_widget('trueTopPostsWidget');
}


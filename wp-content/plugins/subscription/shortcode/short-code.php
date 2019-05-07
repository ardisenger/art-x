<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.10.2018
 * Time: 16:53
 */

/**
 * Шорткод
 * @return string
 */
function conclusion_form_content()
{
    $dir =  esc_url(plugins_url('SMXSubscription/auth/ajax.php'));

    echo '<div class="row">
                <div class="col-md-5 col-sm-5">
                    <h2>Оформление подписки</h2>
                    <div class="custom-heading-subtitle">Для получения доступа к фото и видео введите Ваш номер телефона</div>
                        <form class="ajax" action="'.$dir.'" method="post">                        
                            <div class="form-group">
                                <div class="form-wrap">
                                    <input type="hidden" name="act" value="login">
                                    <input type="text" name="username" class="form-input" placeholder="+70000000000" >
                                </div><br/>    
                                <div class="main-error alert alert-error hide" style="color: red"></div>                            
                               <button class="btn btn-primary" type="submit">Получить контент</button>
                            </div>
                        </form>
                        <br/> 
                    </div>
                </div>
         ';
}
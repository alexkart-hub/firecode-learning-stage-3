<section class="users my-5">
    <div class="container" id="users_table">
        <h1>Пользователи</h1>
        <div class="row tab_header">
            <div class="col-md-1 col-sm-2 col-1 text-center tab">
                ID
            </div>
            <div class="col tab">
                Логин пользователя
            </div>
            <div class="col-lg-2 col-3 text-center tab">
                Действие
            </div>
        </div>
        <!-- ************************************************************ -->
        <?php $counter = 0;
        foreach ($data as $k => $user) :
            if ($k === 'user_' . $counter) :
                $counter++;
                $tab_row_2 = $counter % 2 ? '' : 'tab_row_2'; ?>
                <div class="row tab_row <?= $tab_row_2; ?> ">
                    <div class="col-md-1 col-sm-2 col-1 text-center tab user_id" id="item-<?= $user['user_id']; ?>">
                        <?= $user['user_id']; ?>
                    </div>
                    <div class="col tab login">
                        <?= $user['login']; ?>
                    </div>
                    <div class="col-lg-2 col-3 text-center tab">
                        <i class="fas fa-edit" id="e-<?= $user['user_id']; ?>"></i>
                        <i class="fas fa-times" id="d-<?= $user['user_id']; ?>"></i>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- ************************************************************* -->
    </div>
    <div class="container mb-5">
        <h2 id="AddUserTitle">Добавление нового пользователя</h2>
        <form action="" method="post" >
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm new_user_form">
                    <label for="">Логин</label>
                    <input type="text" placeholder="Логин пользователя" name="login" id="login">
                    <label for="">Пароль</label>
                    <input type="password" placeholder="Пароль пользователя" name="password" id="password">
                    <input id="button1" type="button" value="Добавить пользователя" name="add_user">
                    <div class="new_user_form_out" id="new_user_form_out"></div>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="calculator_setting my-5">
    <div class="container new_user_form">
        <h1>Настройки калькулятора</h1>
        <form method="post">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <label for="">Цена за кв.м потолка:</label>
                    <input type="text" class="input_calc" id="price_area" value="270">
                    <label for="">Цена за светильник:</label>
                    <input type="text" class="input_calc" id="price_lamp" value="170">
                    <label for="">Цена за угол:</label>
                    <input type="text" class="input_calc" id="price_corner" value="120">
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="container px-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Цена за глянцевую фактуру:</label>
                                <input type="text" class="input_calc" id="price_glossy" value="25">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Цена за матовую фактуру:</label>
                                <input type="text" class="input_calc" id="price_matt" value="21">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Цена за люстру:</label>
                                <input type="text" class="input_calc" id="price_chandelier" value="225">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Цена за трубу:</label>
                                <input type="text" class="input_calc" id="price_pipe" value="150">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <label id="label_colors">Варианты цветов</label>
                    <ul>
                        <?php $counter = 1;
                        foreach ($data as $key => $color) :
                            if ($key == "color" . $counter) :
                        ?>
                                <li><?= $color; ?> <i class="fas fa-times" id=<?= $key; ?>></i></li>
                        <?php
                                $counter++;
                            endif;
                        endforeach; ?>
                    </ul>
                    <p class="add_new_color">Добавить новый цвет <i class="fas fa-plus"></i></p>
                    <input id="button2" type="button" value="Сохранить изменения" name="saveChange">
                    <div id="addColorBlock">
                        <label for="addColor">Введите название цвета</label>
                        <input type="text" name="addColor" id="addColor">
                        <div id="addColor_button">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="orders mb-5">
    <div class="container">
        <h1 class="mb-3">Заявки</h1>
        <div class="row tab_header ">
            <div class="col-xl-5 col-lg-3 col-md-5 col-10 order-1">
                <div class="row text-center">
                    <div class="col-xl-1 col-2 tab px-0">ID</div>
                    <div class="col-xl-11 col-10">
                        <div class="row">
                            <div class="col-xl-4 col-12 tab px-0">Телефон</div>
                            <div class="col-xl-4 col-12 tab px-0">Дата рождения</div>
                            <div class="col-xl-4 col-12 tab px-0">Город доставки</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-5 order-3 order-md-2">
                <div class="row">

                    <div class="col-xl-6 col-lg-4">
                        <div class="row">
                            <div class="col-xl-6 tab px-0 text-center">Дата заявки</div>
                            <div class="col-xl-6 tab px-0 text-center">IP</div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8 tab px-3 text-lg-left text-center order-lg-first">Текст заявки</div>
                </div>
            </div>
            <div class="col-xl-1 col-2 order-2 order-md-3 tab px-0 text-center">
                Действие
            </div>
        </div>
    </div>
    <?php $counter = 1;
    foreach($data as $key => $value): 
    if($key==='request'.$counter): ?>
    <div class="container">
        <div class="row tab_row <?=$counter%2==1?'':'tab_row_2'; ?>">
            <div class="col-xl-5 col-lg-3 col-md-5 col-10 order-1">
                <div class="row text-center">
                    <div class="col-xl-1 col-2 tab px-0"><?=$value['request_id'];?></div>
                    <div class="col-xl-11 col-10">
                        <div class="row">
                            <div class="col-xl-4 col-12 tab px-0"><?=$value['phone_number']; ?></div>
                            <div class="col-xl-4 col-12 tab px-0"><?=$value['date_birth']; ?></div>
                            <div class="col-xl-4 col-12 tab px-0"><?=$value['city_destination']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-5 order-3 order-md-2">
                <div class="row">

                    <div class="col-xl-6 col-lg-4">
                        <div class="row">
                            <div class="col-xl-6 tab px-0 text-center"><?=$value['date_request']; ?></div>
                            <div class="col-xl-6 tab px-0 text-center"><?=$value['user_ip']; ?></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8 tab px-0 order-lg-first list">
                        <ul>
                            <?php foreach($value['text_request'] as $k => $v): ?>
                                <li><?=$v[0];?><?=$v[1];?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-1 col-2 order-2 order-md-3 tab px-0 text-center">
                <i class="fas fa-times fa-2x" id="r-<?= $value['request_id']; ?>"></i>
            </div>
        </div>
    </div>
    <?php $counter++;
    endif;
endforeach; ?>
</section>
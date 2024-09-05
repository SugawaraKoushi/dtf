<?php
session_start();
$title = 'О проекте';
require './Head.php';

if (count($_SESSION) <= 0 || is_null($_SESSION['user_id'])) {
    require './UnauthHeader.php'; 
} else {
    require './LoggedInHeader.php';
}

// Возвращает размер директории
function pathSize($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : pathSize($each);
    }
    return $size;
}

$path = isset($_GET['path']) ? $_GET['path'] : '';
$size = '';

if ($path && strpos($path, '..') === false) {
    $path = realpath(__DIR__ . '/' . $path);
    if (strpos($path, realpath(__DIR__)) === 0) {
        $size = pathSize($path);
    }
}

?>

<?php
require 'Menu.php';?>
<div class="content-item">
    <div class="content-header">
        <div class="author">
            <div class="image author-icon">
                <img
                    class="icon"
                    src="/icons/side-menu/topics/games-icon.webp" />
            </div>
            <a class="author-name" href="Popular.php">DTF</a>
            <div class="author-details">
                <span class="posting-time">15.05.2024</span>
            </div>
        </div>
    </div>
    <div class="content-body">
        <h3 class="content-title">Что такое DTF?</h3>
        <article class="content-block">
            <div class="content-text">
                DTF — это проект, разработанный в процессе
                изучения дисциплины Web-Технологии. по ходу
                изучения данной дисциплины предполагается
                выполнить 4 лабораторные работы:
            </div>
            <table class="content-table">
                <caption class="content-table-caption">
                    <h3>Лаб. работы</h3>
                </caption>
                <thead>
                    <tr>
                        <td>№</td>
                        <td>Цель работы</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="content-column-num">
                            1.
                        </td>
                        <td>
                            Ознакомиться с понятием вёрстки
                            веб-страниц, видами вёрстки,
                            основными тегами и атрибутами
                            языка HTML, структурой
                            документа, стилями CSS, их
                            синтаксисом, способами
                            подключения, получить
                            практические навыки создания
                            листов стилей и веб-страниц.
                        </td>
                    </tr>
                    <tr>
                        <td class="content-column-num">
                            2.
                        </td>
                        <td>
                            Ознакомиться с основными
                            возможностями языка JavaScript,
                            синтаксисом, встроенными
                            объектами, событиями DHTML,
                            получить практические навыки
                            программирования на языке
                            JavaScript. Получить
                            практические навыки создания
                            интерактивных веб-страниц.
                        </td>
                    </tr>
                    <tr>
                        <td class="content-column-num">
                            3.
                        </td>
                        <td>
                            Ознакомиться с основными
                            возможностями языка PHP,
                            синтаксисом, основными
                            операциями, получить
                            практические навыки
                            программирования.
                        </td>
                    </tr>
                    <tr>
                        <td class="content-column-num">
                            4.
                        </td>
                        <td>
                            Ознакомиться с основными
                            функциями PHP, применяемыми для
                            работы с MySQL-сервером, изучить
                            и применить на практике механизм
                            сессий.
                        </td>
                    </tr>
                </tbody>
            </table>
        </article>
        <div class="content-counters">
            <div class="content-counter">14K показов</div>
            <div class="content-counter">13K открытий</div>
        </div>
    </div>
    <div class="content-footer">
        <button class="like-button">
            <img
                class="like-icon"
                src="/icons/content/like-icon.svg" />
            <span>320</span>
        </button>
        <button class="comments-button">
            <img
                class="like-icon"
                src="/icons/content/comment-icon.svg" />
            <span>86</span>
        </button>
        <button class="favourite-button">
            <img
                class="like-icon"
                src="/icons/content/favourite-icon.svg" />
            <span>10</span>
        </button>
        <button class="share-button">
            <img
                class="like-icon"
                src="/icons/content/share-icon.svg" />
        </button>
    </div>
</div>
<div class="content-item">
    <div class="content-header">
        <div class="author">
            <div class="image author-icon">
                <img
                    class="icon"
                    src="/icons/side-menu/topics/games-icon.webp" />
            </div>
            <a class="author-name" href="/Popular.php">DTF</a>
            <div class="author-details">
                <span class="posting-time">15.05.2024</span>
            </div>
        </div>
    </div>
    <div class="content-body">
        <h3 class="content-title">Определение размера директории</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="get">
            <label for="path">Путь к директории</label>
            <input class="field" type="text" id="path" name="path" value="<?php echo htmlspecialchars($path) ?>" />
            <button class="button-size-m" type="submit">Проверить</button>
        </form>
        <?php
        if ($size !== '') {
            echo "<p>Размер директории: " . number_format($size / 1048576, 2) . " MB</p>";
        }
        ?>
        <div class="content-counters">
            <div class="content-counter">2K показов</div>
            <div class="content-counter">1K открытий</div>
        </div>
    </div>
    <div class="content-footer">
        <button class="like-button">
            <img
                class="like-icon"
                src="/icons/content/like-icon.svg" />
            <span>320</span>
        </button>
        <button class="comments-button">
            <img
                class="like-icon"
                src="/icons/content/comment-icon.svg" />
            <span>86</span>
        </button>
        <button class="favourite-button">
            <img
                class="like-icon"
                src="/icons/content/favourite-icon.svg" />
            <span>10</span>
        </button>
        <button class="share-button">
            <img
                class="like-icon"
                src="/icons/content/share-icon.svg" />
        </button>
    </div>
</div>
<?php
require './Footer.php'; ?>
<?php
$title = 'О проекте';
require 'head.php';
require 'UnauthHeader.php';

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
require 'Menu.php';
require 'AboutContent.php'; ?>
<div class="content-item">
    <div class="content-header">
        <div class="author">
            <div class="image author-icon">
                <img
                    class="icon"
                    src="icons/side-menu/topics/games-icon.webp" />
            </div>
            <a class="author-name" href="/popular.html">DTF</a>
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
                src="icons/content/like-icon.svg" />
            <span>320</span>
        </button>
        <button class="comments-button">
            <img
                class="like-icon"
                src="icons/content/comment-icon.svg" />
            <span>86</span>
        </button>
        <button class="favourite-button">
            <img
                class="like-icon"
                src="icons/content/favourite-icon.svg" />
            <span>10</span>
        </button>
        <button class="share-button">
            <img
                class="like-icon"
                src="icons/content/share-icon.svg" />
        </button>
    </div>
</div>
<?php
require 'Footer.php'; ?>
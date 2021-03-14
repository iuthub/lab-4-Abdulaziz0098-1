<?php
    include("header.php");
?>

<div id="header">
    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>

<div id="listArea">
    <ul id="musicList">
        <?php
        $data = $_GET["data"];
        $course = fopen($data, "r") or die("Unable to open file!");

        while(!feof($course)) {
            $music = fgets($course);
            $musicName = basename($music);
            ?>
            <li class="mp3item"> <a href="<?= 'songs/'. $music ?>">
                    <?= $musicName ?> </a></li>
        <?php }
            fclose($course);
        ?>
    </ul>
</div>

<?php
    include("footer.php");
?>
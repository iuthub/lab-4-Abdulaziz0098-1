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
        $musicSizeExt = "byte";
        $musicFiles = glob("songs/*.mp3");
        foreach ($musicFiles as $music) {
            $musicName = basename($music);
            $musicSize = filesize($music);

            if ($musicSize > 1024 && $musicSize < 1048575){
                $musicSize = $musicSize / 1024;
                $musicSizeExt = "kb";
            }
            if ($musicSize > 1048575){
                $musicSize = (int) $musicSize / 1048575;
                $musicSizeExt = "mb";
            }
            ?>

            <li class="mp3item">
                <a href="<?= $music ?>"><?= $musicName ?> </a>
                <?= " (".(int)$musicSize ." ". $musicSizeExt." )" ?> </li>
            <?php } ?>


        <?php
        $playlists = glob("songs/*.txt");
        foreach ($playlists as $playlist) {
            $playlistName = basename($playlist);
            ?>
            <li class="playListItem">
                <a href="./playlist.php?data=<?php echo $playlist ?>"><?= $playlistName ?> </a>
            </li>
        <?php } ?>
    </ul>
</div>

<?php
    include("footer.php");
?>

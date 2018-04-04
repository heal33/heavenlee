<html>
    <head>
        <title>RSS Feed Reader</title>
	<style>
	img {width: 500px; display: block; padding: 0 0 10px;}
	section {width: 500px;margin: 0 auto; border-left: 1px solid #ccc;border-right: 1px solid #ccc;padding: 0 20px;}
    h1 {}
    h2 {display: inline; font-size: 1.2em;}
    h2 a {text-decoration: none; color: inherit;}
    ul {padding-left: 0;}
    li {list-style:none; border-bottom: 1px solid #ccc; margin-bottom: 20px;}
</style>
    </head>
    <body>

        <section>
            <h1>News</h1>
        <?php
        //Feed URLs
        $feeds = array(
            "http://www.engadget.com/rss.xml",
            "http://www.reddit.com/r/programming/.rss",
            "http://www.joelonsoftware.com/rss.xml",
            "http://thunk.org/tytso/blog/feed"
        );
        
        //Read each feed's items
        $entries = array();
        foreach($feeds as $feed) {
            $xml = simplexml_load_file($feed);
            $entries = array_merge($entries, $xml->xpath("//item"));
        }
        
        //Sort feed entries by pubDate
        usort($entries, function ($feed1, $feed2) {
            return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
        });
        
        ?>
        

        <ul><?php
        //Print all the entries
        foreach($entries as $entry){
            ?>
            <li><h2><a href="<?= $entry->link ?>"><?= $entry->title ?></a></h2> (<?= parse_url($entry->link)['host'] ?>)
            <p><?= strftime('%m/%d/%Y %I:%M %p', strtotime($entry->pubDate)) ?></p>
            <p><?= $entry->description ?></p></li>
            <?php
        }
        ?>
        </ul>
	</section>
    </body>
</html>

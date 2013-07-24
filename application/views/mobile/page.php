<div data-role="fieldcontain">
        <form method="get" action="<?=base_url('mobile/search/');?>" />
            <fieldset data-role="controlgroup">
                <label for="searchinput1"></label>
                <input type="hidden" name="location" value="" />
                <input type="hidden" name="price" value="" />
                <input name="s" id="searchinput1" placeholder="Looking to hire something?" value="" type="search" />
            </fieldset>
        </form>

</div>

<h2><?=$title;?></h2>

<?=$html;?>


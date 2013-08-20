<div class="container">
    <h4> Invite your friends</h4>
    
    <fb:serverFbml style="width: 755px;">
<script type="text/fbml">
    <fb:fbml>
        <fb:request-form  method="POST" invite="true" type="MassiveFreecell"
                content="You have been invited to the Application Name application. " >
            <fb:multi-friend-selector showborder="false" actiontext="Invite your friends to use this application." />
            <fb:request-form-submit />
        </fb:request-form>
    </fb:fbml>
</script>
    
    <a class="btn" href="<?=base_url('account');?>"> Skip to my Account </a>
</div>
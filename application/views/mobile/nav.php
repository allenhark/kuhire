<body>
       <!-- Home -->
            <div data-role="page" id="page1">
            <div data-theme="b" data-role="header">
                <h5>
                  <a href="<?=base_url('mobile/');?>">  Scrobber </a>
                </h5>
            </div>
            <div data-role="content">
                <div data-role="navbar" data-iconpos="left">
                    <ul>
                        <li>
                            <a href="<?=base_url('mobile/');?>" data-theme="b" data-icon="home">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url('mobile/search/');?>" data-theme="b" data-icon="search">
                                Search
                            </a>
                        </li>
                        <li>
                            <a href="#page1" data-theme="b" data-icon="grid">
                               Browse 
                            </a>
                        </li>
                    </ul>
                </div>
<?php
header("Content-Type:text/html;charset=utf-8");
?>
<form method="post" enctype="multipart/form-data" action="http://localhost:63342/Pheal/businesslogic/healthbl/XMLDealer.php5">
    <div class="form-group">
        <label for="upload">上传</label>
        <input type="file" name="file" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">upload</button>
</form>



<div>
    <div class="row">

        <div class="col-lg-4">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
                <input id="datepicker" class="form-control" style="max-width: 300px" type="text" onClick="WdatePicker()">
            </div>
        </div>
        <div class="col-lg-2" style="alignment: left">
            <button class="btn btn-primary" onclick="getData()">确定</button>
        </div>
    </div>
</div>
<!--sleep-->
<div>
    <nav id="content-nav" class="navbar navbar-default">
        <div class="container" style="width: auto;">
            <ul class="nav">
                <li class="active"><a href="#sleep-statistic">睡眠</a></li>
                <li class=""><a href="#js">锻炼</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Databases<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class=""><a href="#mysql">MySQL</a></li>
                        <li class=""><a href="#pgsql">PostgreSQL</a></li>
                        <li class=""><a href="#mgdb">MongoDB</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div data-spy="scroll" data-target="#content-nav" data-offset="5" class="scrollspy-example" style="position:relative">

        <div id="sleep-statistic">
            <h2>睡眠</h2>
            <h4>睡眠时间：<strong id="sleep-time-text"></strong>, 你的平均睡眠时间：<strong id="sleep-average-time-text"></strong> </h4>
        </div>

        <!--        本次睡眠时间，用户平均睡眠时间，正常人睡眠时间-->
        <div class="row area dark-area">
            <div class="col-lg-4">
                <canvas id="sleep-avg-bar" width="300" height="250">

                </canvas>

            </div>
            <div class="col-lg-8">
                <h1>睡眠时间 </h1>
                <ul>
                    <li><h4>本次睡眠时间为<span class="figure-em" id="this-sleep-figure"></span> 小时</h4> </li>
                    <li id="normal-avg-sleep"></li>
                    <li id="your-avg-sleep"></li>
                </ul>
            </div>
        </div>

        <!--各阶段睡眠详细-->
        <div class="row area light-area">
            <div class="col-lg-6">
                <h1>睡眠过程
                    <div id="sleep-stage-conclusion" style="visibility: visible;">
                        lalalalal
                    </div>
                </h1>
                <a class="btn btn-primary btn-sm" role="button" data-toggle="collapse" href="#stageTable" onclick="detailRecordClicked()">
                    详细记录
                </a>
                <div class="collapse" id="stageTable">
                    <table style="font-size: 12px" class="table table-hover table-condensed" id="sleep-stage-table">
                        <thead>
                        <th>序号</th>
                        <th>睡眠类型</th>
                        <th>开始时间</th>
                        <th>持续时间</th>
                        </thead>
                        <tbody id="sleep-stage-items">

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-lg-6">
                <canvas id="sleep-stage-radar" width="450" height="450">

                </canvas>
            </div>
        </div>

        <!--        各阶段睡眠比例-->
        <div class="row area dark-area">
            <div class="col-lg-4">
                <canvas id="sleep-stage-dougnut" width="200" height="200">

                </canvas>
                <h2></h2>
            </div>
            <div class="col-lg-8">
                <h1>阶段比例</h1>

            </div>
        </div>

        <div>
            <canvas height="300" width="800" id="heart-blood-line"></canvas>
        </div>
        <h4 id="js">JS</h4>
        <p>
            JavaScript is a cross-platform, object-oriented scripting language developed by Netscape. JavaScript was created by Netscape programmer Brendan Eich. It was first released under the name of LiveScript as part of Netscape Navigator 2.0 in September 1995. It was renamed JavaScript on December 4, 1995. As JavaScript works on the client side, It is mostly used for client-side web development.
        </p>
        <h4 id="mysql">MySQL</h4>
        <p>
            MySQL tutorial of w3cschool is a comprhensive tutorial to learn MySQL. We have hundreds of examples covered, often with PHP code. This helps you to learn how to create PHP-MySQL based web applications.
        </p>
        <h4 id="pgsql">PostgreSQL</h4>
        <p>
            In 1986 the Defense Advanced Research Projects Agency (DARPA), the Army Research Office (ARO), the National Science Foundation (NSF), and ESL, Inc sponsored Berkeley POSTGRES Project which was led by Michael Stonebrakessr. In 1987 the first demo version of the project is released. In June 1989, Version 1 was released to some external users. Version 2 and 3 were released in 1990 and 1991. Version 3 had support for multiple storage managers, an query executor was improved, rule system was rewritten. After that, POSTGRES has been started to be implemented in various research and development projects. For example, in late 1992, POSTGRES became the primary data manager for the Sequoia 2000 scientific computing project4. User community around the project also has been started increasing; by 1993, it was doubled.
        </p>
        <h4 id="mgdb">MongoDB</h4>
        <p>
            The term NoSQL was coined by Carlo Strozzi in the year 1998. He used this term to name his Open Source, Light Weight, DataBase which did not have an SQL interface.In the early 2009, when last.fm wanted to organize an event on open-source distributed databases, Eric Evans, a Rackspace employee, reused the term to refer databases which are non-relational, distributed, and does not conform to atomicity, consistency, isolation, durability - four obvious features of traditional relational database systems.</p>
        <p>After reading the largest third party online MySQL tutorial by w3cschool, you will be able to install, manage and develop PHP-MySQL web applications by your own. We have a comprehensive, SQL TUTORIAL, which will help you to understand how to prepare queries to fetch data against various conditions.
        </p>
    </div>
    <hr>
</div>

<script type="text/javascript" src="../../../jquery-2.1.4.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../../bootstrap.min.js"></script>

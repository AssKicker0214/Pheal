<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/1
 * Time: 16:32
 */
?>
<div id="received-test220151130165837_tile" class="list-group-item well-sm">
    <div class="row">
        <div class="col-sm-10">
            <a href="#received-test220151130165837" class="message-title" id="received-test220151130165837_title" data-toggle="collapse" onClick="changeStatusToRead(this.id)" >
                <h3 class="list-group-item-heading">
                    RE:1 again<span style="font-size: 12px;visibility: visible" id="received-test220151130165837_status" class="label label-primary">未读</span>
                </h3>
            </a>
            <label>发信人：</label><span>test2</span>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>时间：</label><span>2015-11-30 16:58:37</span>
        </div>
        <div class="col-sm-2">
            <button style="visibility:visible" onclick="updateModal(this.value)" value="test2;RE:1 again" class="btn btn-primary" data-toggle="modal" data-target="#quickReplyModal" data-recipient="test2">回复</button>
        </div>

    </div>
    <div class="collapse" id="received-test220151130165837">
        <div class="well">
            第二次回复
        </div>
    </div>

</div>

<div id="received-test220151201020620_tile" class="list-group-item well-sm">
    <div class="row">
        <div class="col-sm-10">
            <a href="#received-test220151201020620" class="message-title" id="received-test220151201020620_title" data-toggle="collapse" onClick="changeStatusToRead(this.id)" >
                <h3 class="list-group-item-heading">
                    向 test 申请服务<span style="font-size: 12px;visibility: visible" id="received-test220151201020620_status" class="label label-primary">未读</span>
                </h3>
            </a>
            <label>发信人：</label><span>test2</span>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>时间：</label><span>2015-12-01 02:06:20</span>
        </div>
        <div class="col-sm-2">
            <button style="visibility:visible" onclick="updateModal(this.value)" value="test2;向 test 申请服务" class="btn btn-primary" data-toggle="modal" data-target="#quickReplyModal" data-recipient="test2">回复</button>
        </div>

    </div>
    <div class="collapse" id="received-test220151201020620">
        <div class="well">
            我是测试二
        </div>
    </div>

</div>

<div id="sent-test20151130160859_tile" class="list-group-item well-sm">
    <div class="row">
        <div class="col-sm-10">
            <a href="#sent-test20151130160859" class="message-title" id="sent-test20151130160859_title" data-toggle="collapse" onClick="changeStatusToRead(this.id)" >
                <h3 class="list-group-item-heading">
                    1<span style="font-size: 12px;visibility: hidden" id="sent-test20151130160859_status" class="label label-primary">未读</span>
                </h3>
            </a>
            <label>发信人：</label><span>test</span>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>时间：</label><span>2015-11-30 16:08:59</span>
        </div>
        <div class="col-sm-2">
            <button style="visibility:hidden" onclick="updateModal(this.value)" value="test;1" class="btn btn-primary" data-toggle="modal" data-target="#quickReplyModal" data-recipient="test">回复</button>
        </div>

    </div>
    <div class="collapse" id="sent-test20151130160859">
        <div class="well">
            111
        </div>
    </div>

</div>

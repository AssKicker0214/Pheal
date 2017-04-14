<?php
header("Content-Type: text/html");

//require $_SERVER['DOCUMENT_ROOT'] . "/presentation/tool/QuickReplyWindow.php5";
?>
<div class="modal fade" id="quickReplyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" id="exampleModalLabel">回复&nbsp;<span id="message-recipient-head"></span>&nbsp;的消息 </h2>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="message-recipient" placeholder="接受者用户名">
                    </div>
                    <div class="form-group">
                        <label for="message-title" class="control-label">标题</label>
                        <input class="form-control" type="text" id="message-title" placeholder="标题">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">留言:</label>
                        <textarea class="form-control" id="message-content" placeholder="说点什么..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="sendMessage()">发送</button>
            </div>
        </div>
    </div>
</div>

<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
<!--        <li role="presentation"><a href="#all" aria-controls="home" role="tab" data-toggle="tab">全部</a></li>-->

        <li role="presentation"><a role="button" onclick="getClassifiedMessage(this.text)">写消息</a></li>
        <li role="presentation"><a role="button" onclick="getClassifiedMessage(this.text)">全部消息</a></li>
        <li role="presentation"><a role="button" onclick="getClassifiedMessage(this.text)">接收的消息</a></li>
        <li role="presentation"><a role="button" onclick="getClassifiedMessage(this.text)">发送的消息</a></li>
    </ul>


    <div id="message-container">

            <form >

                <div class="form-group">
                    <label for="message-recipient">收信人(id)</label>
                    <input type="text" class="form-control" name="message-composer-recipient" id="message-composer-recipient">
                </div>

                <div class="form-group">
                    <label for="message-title">主题</label>
                    <input type="text" class="form-control" name="message-composer-title" id="message-composer-title">
                </div>

                <div class="form-group">
                    <label for="message-content">内容</label>
                    <textarea class="form-control" name="message-content" id="message-composer-content"></textarea>
                </div>
                <button class="btn btn-primary" type="button" onclick="composeMessage()">发送</button>
            </form>

    </div>

</div>

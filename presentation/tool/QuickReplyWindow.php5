<div class="modal fade" id="quickReplyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">申请服务</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">接受者(id):</label>
                        <input type="text" class="form-control" id="recipient-id" placeholder="接受者用户名">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">留言:</label>
                        <textarea class="form-control" id="message-text" placeholder="说点什么..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="apply()">发送</button>
            </div>
        </div>
    </div>
</div>
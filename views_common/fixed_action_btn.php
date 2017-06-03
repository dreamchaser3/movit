<!--글쓰기 FAB-->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">share</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">dashboard</i></a></li>
      <li><a class="btn-floating green modal-trigger" href="#modal3"><i class="material-icons">library_add</i></a></li>  
    </ul>
</div>
<!-- Modal Structure (Posting)-->
<div id="modal3" class="modal modal-fixed-footer">
    <div class = "modal-content">
        <h4>Posting</h4>
        <div class="row">
            <form class="col s12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>                   
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="textarea" class="materialize-textarea"></textarea>
                        <label for="textarea">Write Text</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">label</i>
                        <div id="tags" class="chips"></div>
                        <label for="tags">Write tags and hit enter</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>               
    </div>
</div>
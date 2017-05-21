
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Compose New Message</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <input placeholder="To:" class="form-control">
            </div>
            <div class="form-group">
              <input placeholder="Subject:" class="form-control">
            </div>
            <div class="form-group">
              <ul class="wysihtml5-toolbar" style=""><li class="dropdown">
                <a data-toggle="dropdown" class="btn btn-default dropdown-toggle ">

                  <span class="glyphicon glyphicon-font"></span>

                  <span class="current-font">Normal text</span>
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" data-wysihtml5-command-value="p" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Normal text</a></li>
                  <li><a tabindex="-1" data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 1</a></li>
                  <li><a tabindex="-1" data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 2</a></li>
                  <li><a tabindex="-1" data-wysihtml5-command-value="h3" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 3</a></li>
                  <li><a tabindex="-1" data-wysihtml5-command-value="h4" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 4</a></li>
                  <li><a tabindex="-1" data-wysihtml5-command-value="h5" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 5</a></li>
                  <li><a tabindex="-1" data-wysihtml5-command-value="h6" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 6</a></li>
                </ul>
              </li>
              <li>
                <div class="btn-group">
                  <a tabindex="-1" title="CTRL+B" data-wysihtml5-command="bold" class="btn  btn-default" href="javascript:;" unselectable="on">Bold</a>
                  <a tabindex="-1" title="CTRL+I" data-wysihtml5-command="italic" class="btn  btn-default" href="javascript:;" unselectable="on">Italic</a>
                  <a tabindex="-1" title="CTRL+U" data-wysihtml5-command="underline" class="btn  btn-default" href="javascript:;" unselectable="on">Underline</a>

                  <a tabindex="-1" title="CTRL+S" data-wysihtml5-command="small" class="btn  btn-default" href="javascript:;" unselectable="on">Small</a>

                </div>
              </li>
              <li>
                <a tabindex="-1" data-wysihtml5-display-format-name="false" data-wysihtml5-command-value="blockquote" data-wysihtml5-command="formatBlock" class="btn  btn-default" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-quote"></span>

                </a>
              </li>
              <li>
                <div class="btn-group">
                  <a tabindex="-1" title="Unordered list" data-wysihtml5-command="insertUnorderedList" class="btn  btn-default" href="javascript:;" unselectable="on">

                    <span class="glyphicon glyphicon-list"></span>

                  </a>
                  <a tabindex="-1" title="Ordered list" data-wysihtml5-command="insertOrderedList" class="btn  btn-default" href="javascript:;" unselectable="on">

                    <span class="glyphicon glyphicon-th-list"></span>

                  </a>
                  <a tabindex="-1" title="Outdent" data-wysihtml5-command="Outdent" class="btn  btn-default" href="javascript:;" unselectable="on">

                    <span class="glyphicon glyphicon-indent-right"></span>

                  </a>
                  <a tabindex="-1" title="Indent" data-wysihtml5-command="Indent" class="btn  btn-default" href="javascript:;" unselectable="on">

                    <span class="glyphicon glyphicon-indent-left"></span>

                  </a>
                </div>
              </li>
              <li>
                <div data-wysihtml5-dialog="createLink" class="bootstrap-wysihtml5-insert-link-modal modal fade">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a data-dismiss="modal" class="close">×</a>
                        <h3>Insert link</h3>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <input data-wysihtml5-dialog-field="href" class="bootstrap-wysihtml5-insert-link-url form-control" value="http://">
                        </div> 
                        <div class="checkbox">
                          <label> 
                            <input type="checkbox" checked="" class="bootstrap-wysihtml5-insert-link-target">Open link in new window
                          </label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <a href="#" data-wysihtml5-dialog-action="cancel" data-dismiss="modal" class="btn btn-default">Cancel</a>
                        <a data-wysihtml5-dialog-action="save" data-dismiss="modal" class="btn btn-primary" href="#">Insert link</a>
                      </div>
                    </div>
                  </div>
                </div>
                <a tabindex="-1" title="Insert link" data-wysihtml5-command="createLink" class="btn  btn-default" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-share"></span>

                </a>
              </li>
              <li>
                <div data-wysihtml5-dialog="insertImage" class="bootstrap-wysihtml5-insert-image-modal modal fade">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a data-dismiss="modal" class="close">×</a>
                        <h3>Insert image</h3>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <input data-wysihtml5-dialog-field="src" class="bootstrap-wysihtml5-insert-image-url form-control" value="http://">
                        </div> 
                      </div>
                      <div class="modal-footer">
                        <a href="#" data-wysihtml5-dialog-action="cancel" data-dismiss="modal" class="btn btn-default">Cancel</a>
                        <a href="#" data-wysihtml5-dialog-action="save" data-dismiss="modal" class="btn btn-primary">Insert image</a>
                      </div>
                    </div>
                  </div>
                </div>
                <a tabindex="-1" title="Insert image" data-wysihtml5-command="insertImage" class="btn  btn-default" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-picture"></span>

                </a>
              </li>
            </ul><textarea style="height: 300px; display: none;" class="form-control" id="compose-textarea">                      &lt;h1&gt;&lt;u&gt;Heading Of Message&lt;/u&gt;&lt;/h1&gt;
            &lt;h4&gt;Subheading&lt;/h4&gt;
            &lt;p&gt;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
            was born and I will give you a complete account of the system, and expound the actual teachings
            of the great explorer of the truth, the master-builder of human happiness. No one rejects,
            dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
            how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
            is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
            but because occasionally circumstances occur in which toil and pain can procure him some great
            pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
            except to obtain some advantage from it? But who has any right to find fault with a man who
            chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
            produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
            dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
            blinded by desire, that they cannot foresee&lt;/p&gt;
            &lt;ul&gt;
            &lt;li&gt;List item one&lt;/li&gt;
            &lt;li&gt;List item two&lt;/li&gt;
            &lt;li&gt;List item three&lt;/li&gt;
            &lt;li&gt;List item four&lt;/li&gt;
            &lt;/ul&gt;
            &lt;p&gt;Thank you,&lt;/p&gt;
            &lt;p&gt;John Doe&lt;/p&gt;
          </textarea><iframe width="0" height="0" frameborder="0" class="wysihtml5-sandbox" security="restricted" allowtransparency="true" marginwidth="0" marginheight="0" style="display: block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(210, 214, 222); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: 0px none rgb(85, 85, 85); outline-offset: 0px; padding: 6px 12px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: text-bottom; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 300px;"></iframe>
        </div>
        <div class="form-group">
          <div class="btn btn-default btn-file">
            <i class="fa fa-paperclip"></i> Attachment
            <input type="file" name="attachment">
          </div>
          <p class="help-block">Max. 32MB</p>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="pull-right">
          <button class="btn btn-default" type="button"><i class="fa fa-pencil"></i> Draft</button>
          <button class="btn btn-primary" type="submit"><i class="fa fa-envelope-o"></i> Send</button>
        </div>
        <button class="btn btn-default" type="reset" onclick="loadContent(base_url + 'view/_table_pesan_guru')"><i class="fa fa-times"></i> Discard</button>
      </div>
      <!-- /.box-footer -->
    </div>
    <input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_pesan')">
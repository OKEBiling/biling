



<div class="border-top-0 collapse show" id="globalComent">
            
        <div class="overflow-hidden card-body  border-top-0 feed-comments bg-white p-2 pt-0 " id="commentarea" > <hr class="my-0 mx-n4">
            <div role="log" class=" mt-4 conversations p-2  pt-0 ">
                
                <?php if (empty($this->comments)): ?>
                <?php else: ?>
                <?php foreach ($this->comments as $key => $value): ?>
             
                <article class="timeline-comment">
                    <a class="avatar" href="#" target="_blank" tabindex="-1">
                        <img height="33" width="33" alt="@OKEBiling" src="https://avatars.githubusercontent.com/u/144347553?v=4?v=3&amp;s=88">
                    </a>
                    <div class="comment">
                        <header class="comment-header">
                            <span class="comment-meta">
                                <a class="text-link" href="#" target="_blank">
                                    <strong><?=$value['name']?></strong>
                                </a> commented <a class="text-link" href="#" target="_blank"><?= reformatDateTime($value['created_at'])?></a>
                            </span>
                            <div class="comment-actions">
                                <span class="author-association-badge"><?=$value['position']?></span>
                            </div>
                        </header>
                        <div class="markdown-body p-2 markdown-body-scrollable">
                            <p dir="auto">
                                <?=$value['comment']?>
                            </p>
                        </div>
                        <div class="comment-footer">
                            <form class="reaction-list BtnGroup" action="javascript:">
                                <button class="btn BtnGroup-item reaction-button" value="+1" aria-label="Toggle Thumbs Up reaction" reaction-count="5"> 👍 </button>
                                <button class="btn BtnGroup-item reaction-button" value="-1" aria-label="Toggle Thumbs Down reaction" reaction-count="2"> 👎 </button>
                            </form>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
                  <?php endif; ?>
                
                <article class="timeline-comment">
                    <a class="avatar" target="_blank" tabindex="-1" href="#">
                        <img height="44" width="44" alt="@OKEBiling" src="https://avatars.githubusercontent.com/u/144347553?v=4?v=3&amp;s=88">
                    </a>

                    <form class="comment" accept-charset="UTF-8" action="javascript:">
                        <header class="new-comment-header tabnav">
                            <div class="tabnav-tabs" role="tablist">
                                <button type="button" class="tabnav-tab tab-write" role="tab" aria-selected="true"> Write </button>
                                <button type="button" class="tabnav-tab tab-preview" role="tab" aria-selected="false"> Preview </button>
                            </div>
                        </header>

                        <div class="comment-body">
                            <textarea class="form-control message" id="message" placeholder="Leave a comment" aria-label="comment" style=""></textarea>
                            <div class="markdown-body" style="display: none;">
                                Nothing to preview
                            </div>
                        </div>
                        <footer class="new-comment-footer">

                            <button class="btn btn-success btn-sm" type="submit">Comment</button>

                        </footer>
                    </form>
                </article>
            </div>
        </div>
    </div> 


	<br />
	<br />
	<br />

	<div style="height: 25px;">
		<a style="margin-right: 118px; float: right;" class="btn btn-inverse"
			onclick="savePage();"><i class="icon-star"></i> Save</a>
	</div>

	<div>
		<div style="float: left;" class="tree">
			<ul>

				<li><span class="badge badge-important"><i class="icon-minus-sign"></i>
						Controls</span>
					<ul>
                                                <?php include_once '../json_views/json_controls.php'; ?>
                                                <!--
			                        <li>
				                        <a href=""><span><i class="icon-time"></i>
                                                <label class="control-component">Label</label>
                                        </a>
			                        </li>
			                        <li>
				                        <a><span><i class="icon-time"></i>
                                                <input class="control-component" type="button" value="Add Button"/>
                                        </span> </a>
			                        </li>
			                        <li>
				                        <a><span><i class="icon-time"></i>
                                            <img class="control-component" src="../../images/loading.gif" width="100" height="100"   />
                                        </span>
                                        </a>
			                        </li> -->
					</ul></li>


				<li><span><i class="icon-calendar"></i> Pages</span>
					<ul>
						<li><span class="badge badge-success"><i class="icon-minus-sign"></i>
								Already Added</span>
							<ul id="ul_tree_menu_list" class="pages">

							</ul></li>
					</ul></li>

				<li><span><i class="icon-calendar"></i>Design Components</span>
					<ul>
						<li><span class="badge badge-success"><i class="icon-minus-sign"></i>
								Background</span>
							<ul id="ul_background_menu">
								<li id="li_background_image"><span><i class="icon-time"></i> [+]</span>
									<a id="bg_set" href="#"> &ndash; Images</a></li>
								<li id="li_background_color"><span><i class="icon-time"></i> [+]</span>
									<a id="bg_set" href="#"> &ndash; Color</a></li>
							</ul></li>
						<li><span class="badge badge-success"><i class="icon-minus-sign"></i>Text
								Color</span>
							<ul id="ul_text_color">
								<!--	                        <li>-->
								<!--		                        <span><i class="icon-time"></i> [+]</span> &ndash;-->
								<!--		                        <a id="bg_color" href="">Red</a>-->
								<!--	                        </li>-->
								<!--	                        <li>-->
								<!--		                        <span><i class="icon-time"></i> [+]</span> &ndash;-->
								<!--		                        <a id="bg_color" href="">Blue</a>-->
								<!--	                        </li>-->
							</ul></li>
						<li><span class="badge badge-warning"><i class="icon-minus-sign"></i>
								Font</span>
							<ul id="ul_text_font">
								<!--	                        <li>-->
								<!--		                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Arial</a>-->
								<!--	                        </li>-->
								<!--	                        <li>-->
								<!--		                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Tahoma</a>-->
								<!--	                        </li>-->
							</ul></li>
					</ul></li>
				<li><span><i class="icon-calendar"></i> Add Tools</span>
					<ul>
						<li><span class="badge badge-important"><i class="icon-minus-sign"></i>
								Media</span>
							<ul>
								<li><a href=""><span><i class="icon-time"></i> [+]</span> Flash</a>
								</li>
								<li><a href=""><span><i class="icon-time"></i> [+]</span> MP3</a>
								</li>
								<li><a href=""><span><i class="icon-time"></i> [+]</span> Video</a>
								</li>
							</ul></li>

					</ul></li>

			</ul>
		</div>
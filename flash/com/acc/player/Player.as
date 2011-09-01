package com.acc.player {
	import caurina.transitions.*;
	import caurina.transitions.properties.FilterShortcuts;
	import flash.text.TextField;
	import flash.display.StageDisplayState;
	import flash.display.*;
	import flash.events.*;
	import flash.geom.Rectangle;
	import flash.events.MouseEvent;
	import flash.events.Event;
	import flash.display.Stage;
	import flash.utils.*;
	import flash.media.*;
	import flash.net.*;
	import flash.text.*;
	import flash.display.MovieClip;
	import com.acc.player.VideoCls;
	
	public class Player extends MovieClip {
		////// MAIN STAGE MOVIE CLIPS //////
		var videoBox:MovieClip;
		var sidebarBox:MovieClip;
		
		var videoCls:VideoCls;
		
		var leftIcon:MovieClip;
		var rightIcon:MovieClip;
		
		var popoverad:MovieClip;
		var adcontainer:MovieClip;
		var popoverClose:SimpleButton;
		var fullScreen:SimpleButton;
		var videoTrackProgress:MovieClip;
		var videoTrackDownload:MovieClip;
		var volumeButton:SimpleButton;
		var volumeThumb:MovieClip;
		var volumeTrack:MovieClip;
		var volumeSlider:MovieClip;
		var videoItemName:String;
		var columns:Number = 2;
		var xCount:Number;
		var yCount:Number;
		var a:Number = 0;
		var popoverLoader:Loader;
		var placeholderLoader:Loader;
		var videoThumbLoader:Loader;
		var leftIconLoader:Loader;
		var rightIconLoader:Loader;
		var popoverTime:Number;
		var popoverFrequency:Number;
		var twitterFeedUrl:String;
		var placeholderUrl:String;
		
		////// VIDEO VARS //////
		var currentVideo:String;
		var videoSound:SoundTransform;
		var volumeBounds:Rectangle;
		
		// Create the net connection.  There is only one
		var nc:NetConnection;
		// Create the net stream, there are two of these.  One for archive, and one for live feed
		var ns:NetStream;
		// For the live feed
		var nsl:NetStream;
		
		var container_mc:MovieClip;
		var xmlPath:String;
		var xml:XML;
		var loader;
		
		// Save off the preroll ads
		var preroll_ads:Array;
		
		// Save off the popoverads
		var popover_ads:Array;
		
		var gallery1Btn;
		var gallery2Btn;
		var gallery1BtnTxt;
		var gallery2BtnTxt;
		
		var currentGallery:Number;
		var categoryThumbLoader:Loader;
		var categoryItemName:String;
		var i:Number;
		
		var popoverAdInc:int;
	
		var liveFeedConfig:Object;
		var currentPopoverAd:Object;
		
		var sideScrollbarMasker:MovieClip;
		var sideScrollbarThumb:MovieClip;
		var sideScrollbarTrack:MovieClip;
		var yOffset:Number;
		var yMin:Number;
		var yMax:Number;
		var sideScrollThumbDif:Number;
		var currentlyPlayingTarget:Object;
		
		public function Player() {
			////// MAIN STAGE MOVIE CLIPS //////
			videoBox = player_mc;
			sidebarBox = rightSidebar_mc;
			
			leftIcon = player_mc.left_icon;
			rightIcon = player_mc.right_icon;
			
			popoverad = player_mc.popoverad_mc;
			adcontainer = popoverad.ad_container;
			popoverClose = player_mc.popoverad_mc.popover_close;
			fullScreen = player_mc.fullScreen_btn;
			videoTrackProgress = player_mc.videoTrack_mc.videoTrackProgress_mc;
			videoTrackDownload = player_mc.videoTrack_mc.videoTrackDownload_mc;
			volumeButton = player_mc.volume_btn;
			volumeThumb = player_mc.volumeSlider_mc.volumeThumb_mc;
			volumeTrack = player_mc.volumeSlider_mc.volumeTrackFull_mc;
			volumeSlider = player_mc.volumeSlider_mc;
			columns = 2;  // set how many columns we want the video's to be loaded in
			a = 0;  // used to count in the loop
			popoverTime = 0;
			twitterFeedUrl = "";
			placeholderUrl = "";
			
			// Create the net connection.  There is only one
			nc = new NetConnection();
			
			xmlPath = "http://acc.nascarmediagroup.com/xml/";  // path to the xml file
			loader = new URLLoader();  //  create a new loader to load the xml
			
			// Save off the preroll ads
			preroll_ads = [];
			
			// Save off the popoverads
			popover_ads = [];
			
			gallery1Btn = rightSidebar_mc.gallery1Btn_mc;  //  targets the first gallery button above the right sidebar
			gallery2Btn = rightSidebar_mc.gallery2Btn_mc;  // targets the middle gallery button above the right sidebar
			gallery1BtnTxt = rightSidebar_mc.gallery1Btn_mc.galleryTitle1_txt;  //  targets the dynamic text in the first gallery button
			gallery2BtnTxt = rightSidebar_mc.gallery2Btn_mc.galleryTitle2_txt;  //  targets the dynamic text in the second gallery button
			
			currentGallery = 0;  //  sets a variable to holde the current gallery number - set to 0 now
			i = 0;
			
			popoverAdInc = 0;
			
			sideScrollbarMasker = rightSidebar_mc.sideScrollbar_mc.sideScrollbarMask_mc;  // targets the side scrollbar mask
			sideScrollbarThumb = rightSidebar_mc.sideScrollbar_mc.sideScrollbarThumb_mc;  // targets the side scrollber thumb
			sideScrollbarTrack = rightSidebar_mc.sideScrollbar_mc.sideScrollbarTrack_mc;  // targets the side scrollbar track
			yMin = 0;  //  set the minimum height we want the scrubber to go to
		
			stage.scaleMode = StageScaleMode.NO_SCALE;
			stage.align = StageAlign.TOP_LEFT;
			FilterShortcuts.init();
			
			////// FILE STARTUP //////
			volumeThumb.mouseChildren = false;
			volumeThumb.buttonMode = true;
			
			////// SET STAGE //////
			setMyStage();
			stage.addEventListener(Event.RESIZE, myResizeEvent);
			
			////// VIDEO EVENT LISTENERS //////
			volumeThumb.addEventListener(MouseEvent.MOUSE_OVER, btnOver);
			volumeThumb.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
			volumeThumb.addEventListener(MouseEvent.MOUSE_DOWN, volumeScrubberDown);
			volumeButton.addEventListener(MouseEvent.MOUSE_DOWN, volumeBtnDown);
			volumeButton.addEventListener(MouseEvent.MOUSE_UP, volumeBtnUp);
			popoverClose.addEventListener(MouseEvent.CLICK, closePopoverAd);
			fullScreen.addEventListener(MouseEvent.CLICK, goScaledFullScreen);
			
			addEventListenersForGalleryBtns();
			
			// Create and connect the net connection
			nc.addEventListener(AsyncErrorEvent.ASYNC_ERROR, asyncErrorHandler);
			nc.addEventListener(SecurityErrorEvent.SECURITY_ERROR, netSecurityError);
			nc.connect(null);
			
			// Connect the netstream attached to the net connection
			ns = new NetStream(nc);
			
			// Create the video object
			videoCls = new VideoCls(player_mc, this);
			
			ns.addEventListener(NetStatusEvent.NET_STATUS, videoCls.myStatusHandler);
			ns.addEventListener(AsyncErrorEvent.ASYNC_ERROR, asyncErrorHandler);
			
			// Attach the net stream to the video
			videoCls.video.attachNetStream(ns);
			var newMeta:Object = new Object();
			newMeta.onMetaData = onMetaData;
			ns.client = newMeta;
			ns.bufferTime = 5;
		
			////// VOLUME SCRUBBER //////
			videoSound = new SoundTransform();
			videoSound.volume = 1;
			ns.soundTransform = videoSound;
			
			loader.load(new URLRequest(xmlPath));  //  load the xml
			loader.addEventListener(Event.COMPLETE, xmlLoaded);  //  listener for when the xml is loaded
		
			gallery1Btn.addEventListener(MouseEvent.CLICK, galleryBtnClick0);  // add a listener for a click on the gallery1Btn
			gallery2Btn.addEventListener(MouseEvent.CLICK, galleryBtnClick1);
			gallery1Btn.buttonMode = true;  // set buttonMode to true
			gallery1Btn.mouseChildren = false;
			gallery2Btn.buttonMode = true;
			gallery2Btn.mouseChildren = false;
			
			sideScrollbarThumb.addEventListener(MouseEvent.MOUSE_OVER, btnOver);
			sideScrollbarThumb.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
			sideScrollbarThumb.buttonMode = true;
			sideScrollbarThumb.mouseChildren = false;
			videoCls.adThumb = player_mc.videoTrack_mc.advertiseThumb_mc;
		}
		
		public function asyncErrorHandler(Event:AsyncErrorEvent):void
		{
			//trace(event.text);
		}
		
		public function netSecurityError(event:SecurityErrorEvent):void
		{
			trace("netSecurityError: " + event);
		}
		
		public function onBWDone():void
		{
		}
		
		public function onMetaData(newMeta:Object):void
		{
			//trace("Metadata: duration=" + newMeta.duration + " width=" + newMeta.width + " height=" + newMeta.height + " framerate=" + newMeta.framerate);
			videoCls.duration = newMeta.duration;
		}
		
		////// VIDEO BTN FUNCTIONS  //////		
		public function volumeScrubberDown(event:MouseEvent):void
		{
			volumeBounds = new Rectangle(0,0,0,75);
			volumeThumb.startDrag(false, volumeBounds);
			stage.addEventListener(MouseEvent.MOUSE_UP, volumeThumbUp);
			stage.addEventListener(MouseEvent.MOUSE_MOVE, volumeThumbMove);
		}
		
		public function volumeThumbUp(event:MouseEvent):void
		{
			volumeThumb.stopDrag();
			stage.removeEventListener(MouseEvent.MOUSE_UP, volumeThumbUp);
			stage.removeEventListener(MouseEvent.MOUSE_MOVE, volumeThumbMove);
			Tweener.addTween(volumeSlider, {alpha:0, time:.5, transition:"easeOut"});
		}
		
		public function volumeThumbMove(event:MouseEvent):void
		{
			volumeTrack.height = 75 - volumeThumb.y;
			videoSound.volume = (volumeTrack.height) / 50;
			ns.soundTransform = videoSound;
			if (nsl) {
				nsl.soundTransform = videoSound;
			}
		}
		
		public function volumeBtnDown(event:MouseEvent):void {
			Tweener.addTween(volumeSlider, {alpha:1, time:.5, transition:"easeOut"});
		}
		
		public function volumeBtnUp(event:MouseEvent):void {
			// Tweener.addTween(volumeSlider, {alpha:0, time:.5, transition:"easeOut"});
		}
		
		////// BTN OVER &amp; OUT FUNCTIONS //////
		public function btnOver(event:MouseEvent):void
		{
			event.currentTarget.gotoAndPlay("over");
		}
		
		public function btnOut(event:MouseEvent):void
		{
			event.currentTarget.gotoAndPlay("out");
		}
		
		////// POSITION CONTENT //////
		public function setMyStage():void
		{
			//videoBox.x = 3;
			//videoBox.y = 3;
			
			//sidebarBox.x = stage.stageWidth - sidebarBox.width;
			//sidebarBox.y = videoBox.y;
			
			//videoBox.width = sidebarBox.x - 10;
			//videoBox.height = stage.stageHeight - 3;
			//sidebarBox.height = stage.stageHeight - 3;
		}
		
		public function myResizeEvent(event:Event):void
		{
			//videoBox.x = 3;
			//videoBox.y = 3;
			
			//sidebarBox.x = stage.stageWidth - sidebarBox.width;
			//sidebarBox.y = videoBox.y;
			
			//videoBox.width = sidebarBox.x - 10;
			//videoBox.height = stage.stageHeight - 3;
			//sidebarBox.height = stage.stageHeight - 3;
		}
		
		//////////////////  FULL SCREEN /////////////////
		public function goFullScreen(event:MouseEvent):void {
			stage.displayState = StageDisplayState.FULL_SCREEN;
		}
		
		public function goScaledFullScreen(event:MouseEvent){
			var screenRectangle:Rectangle = new Rectangle(videoCls.videoBlackBox.x, videoCls.videoBlackBox.y, videoCls.videoBlackBox.width, videoCls.videoBlackBox.height);
			stage.fullScreenSourceRect = screenRectangle;
			stage.displayState = StageDisplayState.FULL_SCREEN;
		}
		
		public function xmlLoaded(event:Event):void
		{
			if((event.target as URLLoader) != null)   
			{
				xml = new XML(loader.data);  // set the xml variable to the xml data we just loaded in
				loader.removeEventListener(Event.COMPLETE, xmlLoaded);  // remove the listener because we do not need it anymore
				
				// If a live feed exists, loop through the preroll ads, and play each one
				setAds();
				makeFeedItems(true); // run this function when the xml is loaded 
				popoverFrequency = xml.configuration.popover_frequency;
			}
		}
		
		public function setAds():void {
			// Save off the preroll ads
			for each(var prerollAd:XML in xml.prerollad)
			{
				var prerollUrl:String = prerollAd.url;
				var feedUrl:String = null;
				// If the archive video is an rtmp, we need to take care of it
				if (prerollUrl.match("rtmp")) {
					var myPattern:RegExp = /^(.*)\/(.*)\.flv$/gi;
					var temp:String = prerollUrl;
					prerollUrl = prerollUrl.replace(myPattern, "$2");
					feedUrl = temp.replace(myPattern, "$1");
				}
				preroll_ads.push({
					"videoId":prerollAd.attribute("id"),
					"currentVideo": prerollUrl,
					"currentFeed": feedUrl,
					"videoTitle": "",
					"type": "ad"
				});
			}
			
			// Save off the popoverads
			for each(var popover_ad:XML in xml.popoverad)
			{
				popover_ads.push({
					"videoId":popover_ad.attribute("id"),
					"asset": popover_ad.asset,
					"content":popover_ad.content,
					"url": popover_ad.url
				});
			}
		}
		
		public function makeFeedItems(autoplay:Boolean):void
		{
			container_mc = new MovieClip();  //  create a new container
			container_mc.x = 0;  //  set the containers x position
			container_mc.y = 60;  //  set the containers y position
			sidebarBox.addChild(container_mc);  //  add the container to the right sidebar
			
			placeholderUrl = xml.configuration.placeholder;
			loader.load(new URLRequest(placeholderUrl));  //  load the xml
			loader.addEventListener(Event.COMPLETE, placeholderLoaded);  //  listener for when the xml is loaded
			
			placeholderLoader = new Loader();
			placeholderLoader.load(new URLRequest(placeholderUrl));
			placeholderLoader.x = 0;
			placeholderLoader.y = 0;
			videoCls.videoBlackBox.addChild(placeholderLoader);
			placeholderLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, placeholderLoaded);
			
			// Find out if a live feed exists
			makeLiveFeeds(autoplay);
			makeArchiveVideos();
			
			// Check the height of the sidebarBox
			checkContainerHeight();
		}
		
		public function placeholderLoaded(event:Event):void {
			placeholderLoader.width = videoCls.videoBlackBox.width;
			placeholderLoader.height = videoCls.videoBlackBox.height;
			placeholderLoader.contentLoaderInfo.removeEventListener(Event.COMPLETE, placeholderLoaded);
		}
		
		public function makeTwitterFeed():void {
			container_mc = new MovieClip();  //  create a new container
			container_mc.x = 0;  //  set the containers x position
			container_mc.y = 60;  //  set the containers y position
			sidebarBox.addChild(container_mc);  //  add the container to the right sidebar
			
			//twitterFeedUrl = xml.configuration.twitter;
			loader.load(new URLRequest("http://acc.nascarmediagroup.com/twitterxml"));  //  load the xml
			loader.addEventListener(Event.COMPLETE, twitterFeedLoaded);  //  listener for when the xml is loaded
		}
		
		public function twitterFeedLoaded(event:Event):void {
			if((event.target as URLLoader) != null)
			{
				var twitterxml:XML = new XML(loader.data);  // set the xml variable to the xml data we just loaded in   
				loader.removeEventListener(Event.COMPLETE, twitterFeedLoaded);  // remove the listener because we do not need it anymore
				var previousY:Number = 0;
				var previousHeight:Number = 3;
				var spacer:Number = 0;
			
				for each(var feedItem:XML in twitterxml.status) {
					var userName:String = feedItem.user.name;
					var description:String = feedItem.text;
					var time:String = feedItem.created_at;
					
					var twitterItem:twitterItem_mc = new twitterItem_mc;
					
					// Set the title
					twitterItem.twitterTitle_txt.text = userName;
					
					// Set the description
					twitterItem.twitterDesc_txt.text = description;
					twitterItem.twitterDesc_txt.height = 10;
					twitterItem.twitterDesc_txt.wordWrap = true;
					twitterItem.twitterDesc_txt.autoSize = TextFieldAutoSize.LEFT;
					
					// Set the time
					twitterItem.twitterTime_txt.text = time;
					twitterItem.twitterTime_txt.y = twitterItem.twitterDesc_txt.height + twitterItem.twitterTitle_txt.height;
					twitterItem.autoSize = TextFieldAutoSize.LEFT;
					
					// Set the placement of the twitter item
					twitterItem.x = 5;
					twitterItem.y = (previousY + previousHeight) + spacer;
					
					// Set the previous y and height so we know where to place the next one
					previousY = twitterItem.y;
					previousHeight = twitterItem.height;
					spacer = 10;
					
					container_mc.addChild(twitterItem);
				}
			}
			
			// Check the height of the sidebarBox
			checkContainerHeight();
		}
		
		public function makeLiveFeeds(autoplay:Boolean):void {
			for each(var liveStreamNode:XML in xml.livestream) {
				var videoItem:categoryItem_mc = new categoryItem_mc;
				videoItem.categoryItemTitle_txt.text = liveStreamNode.display_name;
				videoItem.categoryItemDesc_txt.text = liveStreamNode.description;
				videoItem.x = 10;
				videoItem.y = (videoItem.height + 3) * i;
				videoItem.buttonMode = true;
				videoItem.mouseChildren = false;
				videoItem.name = "" + a;
				videoItem.id = liveStreamNode.attribute("id");
				videoItem.videoUrl = liveStreamNode.url;
				videoItem.title = liveStreamNode.display_name;
				videoItem.name = liveStreamNode.name;
				videoItem.leftIcon = "http://acc.nascarmediagroup.com/assets/swf/img/team_logos/" + liveStreamNode.left_icon + ".png";
				videoItem.rightIcon = "http://acc.nascarmediagroup.com/assets/swf/img/team_logos/" + liveStreamNode.right_icon + ".png";
				videoItem.addEventListener(MouseEvent.MOUSE_OVER, btnOver);
				videoItem.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
				videoItem.addEventListener(MouseEvent.CLICK, liveStreamClick);
				videoItem.background = "http://acc.nascarmediagroup.com/assets/background/" + liveStreamNode.background;
				//container_mc.alpha = 0;
				//Tweener.addTween(container_mc, {alpha:1, time:.5, transition:"easeOut"});
				if (liveStreamNode.thumbnail != "") {
					var videoThumbURL = "http://acc.nascarmediagroup.com/assets/thumbnail/" + liveStreamNode.thumbnail;
					videoThumbLoader = new Loader();
					videoThumbLoader.load(new URLRequest(videoThumbURL));
					videoThumbLoader.x = 9;
					videoThumbLoader.y = 8;
					videoItem.addChild(videoThumbLoader);
					videoThumbLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, videoThumbLoaded);
				}
				container_mc.addChild(videoItem);
				
				i++;
				
				// If a live feed exists, we need to automatically start playing it
				if (autoplay) {
					videoItem.dispatchEvent(new MouseEvent("click"));
				}
			}
		}
		
		public function makeArchiveVideos():void {
			for each(var videoNode:XML in xml.archive_feed)
			{
				var videoItem:categoryItem_mc = new categoryItem_mc;
				videoItem.categoryItemTitle_txt.text = videoNode.name;
				videoItem.categoryItemDesc_txt.text = videoNode.description;
				videoItem.playingLive_txt.playingLive_txt.text = "NOW PLAYING";
				videoItem.x = 10;
				videoItem.y = (videoItem.height + 3) * i;  
				videoItem.buttonMode = true;
				videoItem.mouseChildren = false;
				videoItem.name = "" + a; 
				videoItem.id = videoNode.attribute("id");
				videoItem.videoUrl = videoNode.high_res;
				videoItem.title = videoNode.name;
				videoItem.leftIcon = "http://acc.nascarmediagroup.com/assets/swf/img/team_logos/" + videoNode.left_icon + ".png";
				videoItem.rightIcon = "http://acc.nascarmediagroup.com/assets/swf/img/team_logos/" + videoNode.right_icon + ".png";
				videoItem.addEventListener(MouseEvent.MOUSE_OVER, btnOver);
				videoItem.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
				videoItem.addEventListener(MouseEvent.CLICK, archiveClick);
				videoItem.background = "http://acc.nascarmediagroup.com/assets/background/" + videoNode.background;
				//container_mc.alpha = 0;    
				//Tweener.addTween(container_mc, {alpha:1, time:.5, transition:"easeOut"});
				if (videoNode.thumbnail != "") {
					var videoThumbURL = "http://acc.nascarmediagroup.com/assets/thumbnail/" + videoNode.thumbnail;
					videoThumbLoader = new Loader();
					videoThumbLoader.load(new URLRequest(videoThumbURL));
					videoThumbLoader.x = 9;
					videoThumbLoader.y = 8;
					videoItem.addChild(videoThumbLoader); 
					videoThumbLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, videoThumbLoaded);
				}
				container_mc.addChild(videoItem);
				i++;
			}
			i = 0;
		}
		
		public function startPopoverAds():void {
			if (!isNaN(popoverFrequency)) {
				setTimeout(showPopoverAd, (popoverFrequency * 1000));
				// setTimeout(showPopoverAd, 1000);
			}
		}
		
		public function showPopoverAd():void {
			var config = popover_ads[popoverAdInc];
			if (config) {
				//adcontainer.removeChildAt(0);
				currentPopoverAd = config;
				if (config.asset != undefined) {
					
					var popoverURL = config.asset;
					popoverLoader = new Loader();
					popoverLoader.load(new URLRequest(popoverURL));
					popoverLoader.x = 0;
					popoverLoader.y = 0;
					adcontainer.addChild(popoverLoader);
					popoverLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, popoverLoaded);
					popoverLoader.addEventListener(MouseEvent.CLICK, clickAd);
				
				}
				if (config.content != undefined) {
					var contentField:TextField = new TextField();
					
					var textFormat:TextFormat = new TextFormat();
					textFormat.color = 0xFFFFFF;
					textFormat.leftMargin = 4;
					textFormat.rightMargin = 4;
					textFormat.size = 15;
					textFormat.font = "Myriad Pro";
					
					contentField.x = 0;
					contentField.y = 0;
					contentField.width = adcontainer.width;
					contentField.height = adcontainer.height;
					contentField.text = config.content;
					contentField.setTextFormat(textFormat);
					adcontainer.addChild(contentField);
					contentField.addEventListener(MouseEvent.CLICK, clickAd);
				}
				adViewed(config);
				Tweener.addTween(popoverad, {alpha:1, time:2, transition:"easeIn"});
			}
			popoverAdInc++;
		}
		
		public function popoverLoaded(event:Event):void {
			event.target.loader.height = adcontainer.height;
			event.target.loader.width = adcontainer.width - 10;
			event.target.loader.contentLoaderInfo.removeEventListener(Event.COMPLETE, popoverLoaded);
		}
		
		public function clickAd(event:MouseEvent):void {
			adClicked(currentPopoverAd);
			var req:URLRequest = new URLRequest(currentPopoverAd.url);
			navigateToURL(req, "_blank");
		}
		
		public function closePopoverAd(event:Event):void {
			Tweener.addTween(popoverad, {alpha:0, time:1, transition:"easeOut"});
		}
		
		public function setCurrent(target:Object):void {
			// Get rid of the last one
			if (currentlyPlayingTarget) {
				Tweener.addTween(currentlyPlayingTarget.playingLive_txt, {alpha:0, time:.5, transition:"easeOut"});
				currentlyPlayingTarget.categoryItemTitle_txt.y = 7;
				currentlyPlayingTarget.categoryItemDesc_txt.y = 27;
			}
			
			// Set the current one
			target.categoryItemTitle_txt.y = 20;
			target.categoryItemDesc_txt.y = 40;
			Tweener.addTween(target.playingLive_txt, {alpha:1, time:.5, transition:"easeOut"});
			currentlyPlayingTarget = target;
		}
		
		public function liveStreamClick(event:MouseEvent):void {
			setCurrent(event.target);
			
			popoverAdInc = 0;
			videoCls.video.attachNetStream(ns);
			Tweener.addTween(leftIcon, {alpha:0, time:1, transition:"easeOut"});
			Tweener.addTween(rightIcon, {alpha:0, time:1, transition:"easeOut"});
			
			ns.pause();
			ns.seek(0);
			/*if (nsl) {
				nsl.pause();
			}*/
			if (nsl) {
				nsl.pause();
				//video.removeChildAt(0);
			}
			ns.seek(0);
			// Clear out the video stack because we clicked, and therefore will start clean
			videoCls.videoStack = [];
			videoCls.moviePlaying = false;
			
			// Play all prerolls here
			playPrerolls();
			var config:Object = {
				"videoId":event.target.id,
				"currentVideo": event.target.videoUrl,
				"videoTitle": event.target.title,
				"videoName": event.target.name,
				"leftIcon": event.target.leftIcon,
				"rightIcon": event.target.rightIcon,
				"background": event.target.background,
				"type": "live"
			}
			playVideo(config);
			playStack();
		}
		
		public function archiveClick(event:MouseEvent):void
		{
			setCurrent(event.target);
			popoverAdInc = 0;
			videoCls.video.attachNetStream(ns);
			Tweener.addTween(leftIcon, {alpha:0, time:1, transition:"easeOut"});
			Tweener.addTween(rightIcon, {alpha:0, time:1, transition:"easeOut"});
			
			ns.pause();
			ns.seek(0);
			if (nsl) {
				nsl.pause();
			}
			// Clear out the video stack because we clicked, and therefore will start clean
			videoCls.videoStack = [];
			videoCls.moviePlaying = false;
			
			// Play a single preroll here
			playRandomPreroll();
			var videoUrl = event.target.videoUrl.toString();
			var feedUrl = null;
			
			// If the archive video is an rtmp, we need to take care of it
			if (event.target.videoUrl.match("rtmp")) {
				var myPattern:RegExp = /^(.*)\/(.*)\.flv$/gi;
				var temp:String = videoUrl;
				videoUrl = videoUrl.replace(myPattern, "$2");
				feedUrl = temp.replace(myPattern, "$1");
			}
			
			var config:Object = {
				"videoId":event.target.id,
				"currentVideo": videoUrl,
				"currentFeed": feedUrl,
				"videoTitle": event.target.title,
				"leftIcon": event.target.leftIcon,
				"rightIcon": event.target.rightIcon,
				"background": event.target.background,
				"type": "archive"
			}
			playVideo(config);
			
			playStack();
		}
		
		public function playVideo(config:Object):void {
			// A video has been played.  Push the config of this video to the video stack
			// This video stack will be used to pull the top video off, and play it.
			videoCls.videoStack.push(config);
			
			// When it first comes in, we need to check to see if a video is already playing.
			// If it is, we need to put this video on the stack to be pulled when the current finishes
		}
		
		public function videoViewed(config:Object):void {
			var type = (config.type == "live") ? "livestreamfeed" : (config.type == "ad") ? "prerollad" : "archivefeed";
			var statUrl = "http://acc.nascarmediagroup.com/xml/" + type + "/" + config.videoId;
			loader.load(new URLRequest(statUrl));  //  load the xml
			loader.addEventListener(Event.COMPLETE, statLoaded);  //  listener for when the xml is loaded
		}
		
		public function adViewed(config:Object):void {
			var statUrl = "http://acc.nascarmediagroup.com/xml/popoverad/" + config.videoId + "/view";
			loader.load(new URLRequest(statUrl));  //  load the xml
			loader.addEventListener(Event.COMPLETE, statLoaded);  //  listener for when the xml is loaded
		}
		
		public function adClicked(config:Object):void {
			var statUrl = "http://acc.nascarmediagroup.com/xml/popoverad/" + config.videoId + "/click";
			loader.load(new URLRequest(statUrl));  //  load the xml
			loader.addEventListener(Event.COMPLETE, statLoaded);  //  listener for when the xml is loaded
		}
		
		public function statLoaded(event:Event):void {
			loader.removeEventListener(Event.COMPLETE, statLoaded);
		}
		
		public function playStack():void {
			if (videoCls.moviePlaying) {
				return;
			}
			videoCls.moviePlaying = true;
			
			// Take the first video off of the stack, and play it.
			var config = videoCls.videoStack.splice(0,1)[0];
			
			if (config) {
				Tweener.addTween(videoCls.videoPreloader, {alpha:.8, time:1, transition:"easeOut"});
				videoCls.video.attachNetStream(ns);
				videoCls.videoType = config.type;
				videoItemName = config.videoId;  // set the videoItemName variable to the current targets name
				currentVideo = config.currentVideo;  // set the current video variable to the video in the xml 
				
				// If it has a title, set it.
				if (config.videoTitle) {
					videoCls.videoTitleTxt.text = config.videoTitle;  // set the videoTitleTxt field to the name of the current video
				}
				else {
					videoCls.videoTitleTxt.text = "";
				}
				
				videoCls.videoWidth = 496;
				videoCls.videoHeight = 300;
				videoCls.video.width = videoCls.videoWidth;  // set the video's width to the videoWidth variable
				videoCls.video.height = videoCls.videoHeight;  // set the video's height to the videoHeight variable
				videoCls.positionVideo();
				if (videoCls.videoType == "live") {
					videoCls.feedServerPlaying = true;
			
					/*placeholderUrl = xml.configuration.placeholder;
					loader.load(new URLRequest(placeholderUrl));  //  load the xml
					loader.addEventListener(Event.COMPLETE, placeholderLoaded);  //  listener for when the xml is loaded
					
					placeholderLoader = new Loader();
					placeholderLoader.load(new URLRequest(placeholderUrl));
					placeholderLoader.x = 0;
					placeholderLoader.y = 0;
					videoCls.videoBlackBox.addChild(placeholderLoader);
					placeholderLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, placeholderLoaded);*/
			
			
					// play the live stream
					liveFeedConfig = config;
					nc.addEventListener(NetStatusEvent.NET_STATUS, playLiveFeed);
					nc.connect(currentVideo);
					Tweener.addTween(videoCls.pauseBtn, {alpha:.3, time:.5, transition:"easeOut"});
					videoCls.liveFeedPlaying = true;
				}
				else if (config.currentFeed != null) {
					videoCls.feedServerPlaying = true;
					videoCls.liveFeedPlaying = false;
					liveFeedConfig = config;
					if (videoCls.videoType != "ad") {
						Tweener.addTween(videoCls.pauseBtn, {alpha:1, time:.5, transition:"easeOut"});
					}
					nc.addEventListener(NetStatusEvent.NET_STATUS, playArchiveFeed);
					nc.connect(config.currentFeed);
				}
				else {
					videoCls.feedServerPlaying = false;
					Tweener.addTween(videoCls.pauseBtn, {alpha:1, time:.5, transition:"easeOut"});
					videoCls.liveFeedPlaying = false;
					videoViewed(config);
					ns.play(currentVideo);  // add the ns.play line back and play the currentVideo variable
				}
				
				videoCls.video.addEventListener(Event.ENTER_FRAME, videoTimeEnterFrame);  // runs this function every time we enter a new frame
			}
			
			if (config && config.type != "ad") {
				startPopoverAds();
				videoCls.videoAdvertisementTxt.text = "";
				
				if (leftIconLoader && rightIconLoader) {
					leftIcon.removeChild(leftIconLoader);
					rightIcon.removeChild(rightIconLoader);
				}
				
				var leftIconURL = config.leftIcon;
				leftIconLoader = new Loader();
				leftIconLoader.load(new URLRequest(leftIconURL));
				leftIconLoader.x = -3;
				leftIconLoader.y = -4;
				leftIcon.addChild(leftIconLoader);
				leftIconLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, leftIconLoaded);
				
				var rightIconURL = config.rightIcon;
				rightIconLoader = new Loader();
				rightIconLoader.load(new URLRequest(rightIconURL));
				rightIconLoader.x = -3;
				rightIconLoader.y = -4;
				rightIcon.addChild(rightIconLoader);
				rightIconLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, rightIconLoaded);
			}
			else if (config && config.type == "ad") {
				Tweener.addTween(videoCls.pauseBtn, {alpha:.3, time:.5, transition:"easeOut"});
				videoCls.liveFeedPlaying = true;
				closePopoverAd(new MouseEvent("click"));
				videoCls.videoAdvertisementTxt.text = "ADVERTISEMENT";
			}
		}
		
		public function playLiveFeed(event:NetStatusEvent):void {
			var info:Object = event.info;
			if (info.code == "NetConnection.Connect.Success") {
				videoCls.videoAdvertisementTxt.text = "";
				videoCls.videoThumb.width = 0;
				nc.removeEventListener(NetStatusEvent.NET_STATUS, playLiveFeed);
				
				nsl = new NetStream(nc);
				nsl.addEventListener(NetStatusEvent.NET_STATUS, videoCls.myStatusHandler);
				nsl.addEventListener(AsyncErrorEvent.ASYNC_ERROR, asyncErrorHandler);
				
				// Attach the net stream to the video
				
				videoCls.video.attachNetStream(nsl);
				var newMetal:Object = new Object();
				newMetal.onMetaData = onMetaData;
				nsl.client = newMetal;
				nsl.bufferTime = 5;
				
				Tweener.addTween(videoCls.playBtn, {alpha:0, time:.5, transition:"easeOut"});
				videoViewed(liveFeedConfig);
				nsl.play("" + liveFeedConfig.videoName + "");
			}
		}
		
		public function playArchiveFeed(event:NetStatusEvent):void {
			var info:Object = event.info;
			if (info.code == "NetConnection.Connect.Success") {
				videoCls.videoAdvertisementTxt.text = "";
				videoCls.videoThumb.width = 0;
				nc.removeEventListener(NetStatusEvent.NET_STATUS, playArchiveFeed);
				
				nsl = new NetStream(nc);
				nsl.addEventListener(NetStatusEvent.NET_STATUS, videoCls.myStatusHandler);
				nsl.addEventListener(AsyncErrorEvent.ASYNC_ERROR, asyncErrorHandler);
				
				// Attach the net stream to the video
				
				videoCls.video.attachNetStream(nsl);
				var newMetal:Object = new Object();
				newMetal.onMetaData = onMetaData;
				nsl.client = newMetal;
				nsl.bufferTime = 5;
				
				Tweener.addTween(videoCls.playBtn, {alpha:0, time:.5, transition:"easeOut"});
				videoViewed(liveFeedConfig);
				nsl.play("" + liveFeedConfig.currentVideo + "");
			}
		}
		
		public function leftIconLoaded(event:Event):void {
			leftIconLoader.contentLoaderInfo.removeEventListener(Event.COMPLETE, leftIconLoaded);
			Tweener.addTween(leftIcon, {alpha:1, time:1, transition:"easeOut"});
		}
		
		public function rightIconLoaded(event:Event):void {
			rightIconLoader.contentLoaderInfo.removeEventListener(Event.COMPLETE, rightIconLoaded);
			Tweener.addTween(rightIcon, {alpha:1, time:1, transition:"easeOut"});
		}
		
		public function playPrerolls():void {
			for each(var prerollConfig:Object in preroll_ads)
			{
				playVideo(prerollConfig);
			}
		}
		
		public function playRandomPreroll():void {
			var randomNumber = Math.round(Math.random() * (preroll_ads.length - 1)) + 1;
			randomNumber--;
			
			var config:Object;
			var inc = 0;
			for each(var randomPreroll:Object in preroll_ads)
			{
				if (inc == randomNumber) {
					config = randomPreroll;
					playVideo(config);
				}
				inc++;
			}
		}
		
		public function videoTimeComplete():void {
			playStack();
		}
		
		public function videoTimeEnterFrame(event:Event):void
		{
			var tempNS:NetStream = (!videoCls.feedServerPlaying) ? ns : nsl;
			if (!tempNS) {
				return;
			}
			var totalSeconds:Number = tempNS.time;  // variable to hold the ns.time
			var totalSeconds2:Number = videoCls.duration;  // variable to hold the duration
			var minutes:Number = Math.floor(totalSeconds / 60);  // variable to hold the rounded down totalSeconds divided by 60
			var minutes2:Number = Math.floor(totalSeconds2 / 60);  // variable to hold the rounded down totalSeconds2 divided by 60
			var seconds = Math.floor(totalSeconds) % 60;  // variable to get 60 percent of the totalSeconds
			var seconds2 = Math.floor(totalSeconds2) % 60;  // variable to get 60 percent of the totalSecond2
			if(seconds < 10)  // if the seconds variable is less than 10 then...
			{
				seconds = "0" + seconds;  // the seconds variable is equal to 0:seconds
			}
			if(seconds2 < 10) // if the seconds2 variable is less than 10 then...
			{
				seconds2 = "0" + seconds2;  //  the seconds2 variable is equal to 0:seconds
			}
			
			// Show the preloader for the video
			if (tempNS.time == 0) {
				videoCls.videoPreloader.visible = true;
			}
			else {
				videoCls.videoPreloader.visible = false;
			}
			
			videoCls.videoTimeProgressTxt.text = minutes + ":" + seconds;
			videoCls.videoTimeDurationTxt.text = (isNaN(minutes2) && isNaN(seconds2)) ? "N/A" : minutes2 + ":" + seconds2;  // update the videoTimeTxt field with the total time and current time.
			if (isNaN(minutes2) && isNaN(seconds2)) {
				videoCls.videoThumb.width = 0;
			}
			
			if(minutes + ":" + seconds == minutes2 + ":" + seconds2) {
				videoCls.moviePlaying = false;
				videoTimeComplete();
			}
		}
		
		public function videoThumbLoaded(event:Event):void
		{
			event.target.loader.height = 57;
			event.target.loader.width = 96;
			event.target.loader.contentLoaderInfo.removeEventListener(Event.COMPLETE, videoThumbLoaded);
			var videoPreloader = event.target.loader.parent.videoItemPreloader_mc;
			Tweener.addTween(videoPreloader, {alpha:0, time:1.5, transition:"easeOut"});
		}
		
		public function addEventListenersForGalleryBtns():void
		{
			if(currentGallery == 0) // if our current gallery variable is set to "0" then run the body below
			{
				gallery1Btn.removeEventListener(MouseEvent.MOUSE_OVER, btnOver);  // remove the gallery1Btn listener for the btnOver function
				gallery1Btn.removeEventListener(MouseEvent.MOUSE_OUT, btnOut);  // remove the gallery1Btn listener for the btnOut function
				gallery1Btn.gotoAndStop("active"); // go to the active frame label in the gallery1Btn movieclip
				gallery2Btn.addEventListener(MouseEvent.MOUSE_OVER, btnOver);  // add the gallery2Btn movieclip listener for the btnOver function
				gallery2Btn.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
				gallery2Btn.gotoAndStop("out");
			}
			if(currentGallery == 1)
			{
				gallery1Btn.addEventListener(MouseEvent.MOUSE_OVER, btnOver);
				gallery1Btn.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
				gallery1Btn.gotoAndStop("out");
				gallery2Btn.removeEventListener(MouseEvent.MOUSE_OVER, btnOver);
				gallery2Btn.removeEventListener(MouseEvent.MOUSE_OUT, btnOut);
				gallery2Btn.gotoAndStop("active");
			}
		}
		
		public function galleryBtnClick0(event:MouseEvent):void
		{
			if(currentGallery != 0)  //  if the current gallery variable is not equal to 0 then run the body code below
			{
				Tweener.addTween(container_mc, {alpha:0, time:.5, transition:"easeOut", onComplete:removeGallery0});  // tween the container_mc to an alpha of 0. on complete run the removeGallery0 function
			}
		}
		
		public function galleryBtnClick1(event:MouseEvent):void
		{
			if(currentGallery != 1)
			{
				Tweener.addTween(container_mc, {alpha:0, time:.5, transition:"easeOut", onComplete:removeGallery1});
			}
		}
		
		public function removeGallery0():void
		{
			currentGallery = 0;  // sets the currentGallery function to 0
			addEventListenersForGalleryBtns();  // run this function
			sidebarBox.removeChild(container_mc);  // remove the container_mc from the sidebarBox
			makeFeedItems(false);
		}
		
		public function removeGallery1():void
		{
			currentGallery = 1;
			addEventListenersForGalleryBtns();
			sidebarBox.removeChild(container_mc);
			makeTwitterFeed();
		}
		
		public function checkContainerHeight():void
		{
			if(container_mc.height > sideScrollbarMasker.height)
			{
				linkSideScroller();  // add a listener to check for the linked side scrollbar
				sideScrollbarThumb.addEventListener(MouseEvent.MOUSE_DOWN, sideScrollbarThumbDown);  // add the mouse down listener for the sideScrollbarThumb
				stage.addEventListener(MouseEvent.MOUSE_UP, sideScrollbarThumbUp);  //  add the mouse up listener for the sideScrollbar thumb
				sideScrollbarThumb.visible = true;
				sideScrollbarThumb.alpha = 0;
				Tweener.addTween(sideScrollbarThumb, {alpha:1, time:.5, transition:"easeOut"});
			}
			else
			{
				sideScrollbarThumb.removeEventListener(MouseEvent.MOUSE_DOWN, sideScrollbarThumbDown);  // remove the listener for the mouse down
				stage.removeEventListener(MouseEvent.MOUSE_UP, sideScrollbarThumbUp);    // remove the listener for the mouse up
				Tweener.addTween(sideScrollbarThumb, {alpha:0, time:.5, transition:"easeOut", onComplete:hideSideScrollbarThumb});
			}
		}
		
		public function hideSideScrollbarThumb():void
		{
			sideScrollbarThumb.visible = false;  // make the sideScrollbarThumb movieclip not visible
		}
		
		public function linkSideScroller():void
		{
			sideScrollbarThumb.y = 0;  // set the sideScrollbarThumb's y position to 0 when it loads
			container_mc.mask = sideScrollbarMasker;  //  mask the container_mc with the sideScrollbarMasker
			yMax = sideScrollbarTrack.height - sideScrollbarThumb.height;  // set the yMax variable to a number that is the track height - the scrollbarThumb's height
		}
		
		public function sideScrollbarThumbDown(event:MouseEvent):void
		{
			sideScrollbarThumb.removeEventListener(MouseEvent.MOUSE_OVER, btnOver);
			sideScrollbarThumb.removeEventListener(MouseEvent.MOUSE_OUT, btnOut);
			stage.addEventListener(MouseEvent.MOUSE_MOVE, sideScrollbarThumbMove);  // add listener for when we have the mouse held down and we move the mouse
			yOffset = mouseY - sideScrollbarThumb.y;  //  get the distance from our mouse's y position to our sideScrollbarThumb's y position so it does not jump when we click
		}
		
		public function sideScrollbarThumbUp(event:MouseEvent):void
		{
			sideScrollbarThumb.addEventListener(MouseEvent.MOUSE_OVER, btnOver);
			sideScrollbarThumb.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
			sideScrollbarThumb.gotoAndStop("over");  // when our mouse is down we want the scrubber thumb to be down too
			Tweener.addTween(container_mc, {_Blur_blurY:0, time:1, transition:"easeOut"});  // remove the blur from the container_mc
			stage.removeEventListener(MouseEvent.MOUSE_MOVE, sideScrollbarThumbMove);  // remove the listener for when we move our mouse
		}
		
		public function sideScrollbarThumbMove(event:MouseEvent):void
		{
			sideScrollbarThumb.y = mouseY - yOffset;  // use the variables above to make the mouse not jump
		
			if(sideScrollbarThumb.y <= yMin)  // if the sideScrollbarThumb's y position is less than the yMin variable then...
			{
				sideScrollbarThumb.y = yMin;    // only let the sidScrollbarThumb move to the yMin
			}
			if(sideScrollbarThumb.y >= yMax)    //  if the sideScrollbarThumb's y position is greater then the yMax variable then...
			{
				sideScrollbarThumb.y = yMax;    // only let the sideScrollbarThumb move to the yMax
			}
			sideScrollThumbDif = sideScrollbarThumb.y / yMax;    // divide the sideScrollbarThumbs y position by the yMax variable to be use when we move the container_mc
			Tweener.addTween(container_mc, {y:((-sideScrollThumbDif * (container_mc.height - sideScrollbarMasker.height)) + 58), _Blur_blurY:5, time:1, transition:"easeOut"});  // move and blur the container_mc and blur it for a nice effect
			event.updateAfterEvent();  // update the event after it runs for a smoother animation.
		}
		
		
	}
}
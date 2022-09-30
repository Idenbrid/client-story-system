<template>
    <div style="width: 500px">
        <!-- <video id="myVideo" playsinline class="video-js vjs-default-skin">
            <p class="vjs-no-js">
                To view this video please enable JavaScript, or consider upgrading to a
                web browser that 
                 <a href="https://videojs.com/html5-video-support/" target="_blank">
                    supports HTML5 video.
                </a> 
             </p>
        </video> -->
     
                <!-- <button type="button" class="btn btn-sm" @click.prevent="startRecording()" v-bind:disabled="isStartRecording" id="btnStart">▶️ Recording Now</button>
        <button type="button" class="btn btn-sm" @click.prevent="retakeVideo()" v-bind:disabled="isRetakeDisabled" id="btnRetake">🔼Retake</button>
        <br> -->
        <form method="POST">
          <div class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-4 bg-white">
            <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
                <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
                    <span>Title</span>
                    <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                        <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
                </div>
                <input type="text" v-model="title" name="title" class="border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="Once upon a time, there was billa..." />
            </div>
            <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
                <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
                    <span>Description</span>
                    <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                        <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
                </div>
                <textarea type="text" v-model="content" name="content" class="border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="Once upon a time, there was billa..."></textarea>
            </div>
            <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
            <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
              <span>Type</span>
              <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                  <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
            </div>
            <select name="type" v-model="type" id="type" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
              <option value="A" selected>A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
            </select>
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
            <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
              <span>Hide</span>
              <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                  <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
            </div>
            <select name="hide" v-model="hide" id="hide" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
              <option value="0" selected>No</option>
              <option value="1">Yes</option>
            </select>
        </div>

        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
            <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
              <span>Source</span>
            </div>
            <select name="source_id" v-model="source_id" id="source_id" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
              <option  v-for="(source, index) in sources" :key="index" :value="source.source_id">{{ source.source_name }}</option>
            </select>
        </div>
        </div>
        <button type="button" class="btn btn-info" @click.prevent="submitVideo()" v-bind:disabled="isSaveDisabled" id="btnSave">✅{{ submitText }}</button>
    </form>
    </div>
</template>

<script>
    
    import axios from 'axios';
import 'video.js/dist/video-js.css'
import 'videojs-record/dist/css/videojs.record.css'
import videojs from 'video.js'
import 'webrtc-adapter'
import RecordRTC from 'recordrtc'
import Record from 'videojs-record/dist/videojs.record.js'
import FFmpegjsEngine from 'videojs-record/dist/plugins/videojs.record.ffmpegjs.js';
export default {
    props: ['uploadUrl','sources'],
    data() {
        return {
            title: '',
            content: null,
            type: '',
            hide: '',
            source_id: '',
            player: '',
            sources: [],
            retake: 0,
            isSaveDisabled: true,
            isStartRecording: false,
            isRetakeDisabled: true,
            submitText: 'Submit',
            options: {
                controls: true,
                bigPlayButton: false,
                controlBar: {
                    deviceButton: false,
                    recordToggle: false,
                    pipToggle: false
                },
                width: 500,
                height: 300,
                fluid: true,
                plugins: {
                    record: {
                        pip: false,
                        audio: true,
                        video: true,
                        maxLength: 10,
                        debug: true
                    }
                }
            }
        }
    },
    mounted() {
        this.player = videojs('myVideo', this.options, () => {
            // print version information at startup
            var msg = 'Using video.js ' + videojs.VERSION +
                ' with videojs-record ' + videojs.getPluginVersion('record') +
                ' and recordrtc ' + RecordRTC.version;
            videojs.log(msg);
        });
        // error handling
        this.player.on('deviceReady', () => {
            this.player.record().start();
            console.log('device ready:');
        });
        this.player.on('deviceError', () => {
            console.log('device error:', this.player.deviceErrorCode);
        });
        this.player.on('error', (element, error) => {
            console.error(error);
        });
        // user clicked the record button and started recording
        this.player.on('startRecord', () => {
            console.log('started recording!');
        });
        // user completed recording and stream is available
        this.player.on('finishRecord', () => {
            this.isSaveDisabled = false;
            if(this.retake == 0) {
                this.isRetakeDisabled = false;
            }
            // the blob object contains the recorded data that
            // can be downloaded by the user, stored on server etc.
            console.log('finished recording: ', this.player.recordedData);
        });
    },
    created(){
        axios.get('/get-sources')
        .then((res) => {
            console.log(res)
            this.sources = res.data
        })
    },
    methods: {
        startRecording() {
            this.isStartRecording = true;
            this.player.record().getDevice();
        },
        submitVideo() {
            this.isSaveDisabled = true;
            this.isRetakeDisabled = true;
            var data = this.player.recordedData;
            var formData = new FormData();
            formData.append('video', data, data.name);
            formData.append('title', this.title);
            formData.append('content', this.content);
            formData.append('type', this.type);
            formData.append('hide', this.hide);
            formData.append('source_id', this.source_id);
            this.player.record().stopDevice();
            fetch('/admin/stories/store', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(
                success => {
                    
                    this.submitText = "Story Added Successfully!";
                    window.location.href = "/admin/stories";
                }
            ).catch(
                error =>{
                    
                    this.submitText = "Upload Failed";
                }
            );
        },
        retakeVideo() {
            this.isSaveDisabled = true;
            this.isRetakeDisabled = true;
            this.retake += 1;
            this.player.record().start();
        }
    },
    beforeDestroy() {
        if (this.player) {
            this.player.dispose();
        }
    }
}
</script>

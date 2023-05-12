<template>
  <v-main>
    <v-row class="ma-1 news-activitie">
      <!-- dialogInsert -->
      <v-dialog v-model="dialoginsert" width="auto">
        <template v-slot:activator="{ props }">
          <v-col cols="8" class="d-flex align-end">
            <v-btn color="#D50703" class="text-white" v-bind="props"
              ><i class="mdi mdi-text-box-plus-outline"></i>Insert
            </v-btn>
          </v-col>
        </template>
        <v-card>
          <v-toolbar
            class="text-center text-white"
            color="#D50703"
            title="INSERT INTO NEWS & ACTIVITIES"
          ></v-toolbar>
          <v-card-text>
            <v-container>
                <v-row class="d-flex align-center">
                  <v-col cols="12">
                    <v-text-field label="Title :" variant="solo" color="#D50703" placeholder="Title..." v-model="new_at.title" required></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field label="Video Name :" variant="solo" color="#D50703" placeholder="Video Name..." v-model="new_at.videoName" required></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field label="YouTube Link :" variant="solo" color="#D50703" placeholder="YouTube Link..." v-model="new_at.videoLink" required></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-textarea label="Description :" variant="solo" color="#D50703" placeholder="Description..." v-model="new_at.description" required></v-textarea>
                  </v-col>



                  <v-col cols="12">
                    <v-file-input label="Choose File" class="d-none" id="imageFC" @change="fileChangeFC"></v-file-input>
                    <div>Front Cover</div>
                    <div class="my-2"><label for="imageFC"><v-img :src="noImageFC" width="200px" height="200px" class="border cursor" cover/></label></div>
                  </v-col>
                  <v-divider :thickness="2" class="my-3" color="brack"></v-divider>

                  <v-col cols="12">
                    <!-- <v-file-input label="Choose File" class="d-none" id="imageGL" @change="fileChangeGL" v-model="new_at.imageGL" multiple></v-file-input> -->
                    <div>Gallery Images</div>
                    <div class="my-2">
                      <!-- <label for="imageGL"><v-img :src="noImageGL" width="200px" height="200px" class="border" cover/></label> -->
                      <v-row>
                        <v-col class="d-flex justify-center fileinsert" cols="3">
                          <div class="choose-img">
                            <label for="imageGL" class="my-auto"><i class="mdi mdi-image-plus-outline"></i></label>
                          </div>
                            <input
                              type="file"
                              id="imageGL"
                              accept="image/png, image/gif, image/jpeg"
                              multiple
                              @change="fileChangeGL"
                            />
                          
                        </v-col>
                        <v-col cols="3" v-if="imageGL != '' || imageGL != null" v-for="(img,index) in imageGL" :key="index"><v-img :src="img" width="200px" height="200px" class="border" cover/></v-col>
                      </v-row>
                    </div>
                  </v-col>
                  <v-divider :thickness="2" class="my-3" color="brack"></v-divider>

                  <v-col cols="12" class="text-center">
                    <v-btn color="#00C853" class="text-white me-5" width="100px" @click="saveData(), dialoginsert = false">
                      Save
                    </v-btn>

                    <v-btn color="#F44336" class="text-white" width="100px" @click="dialoginsert = false, clear()">
                      Cancle
                    </v-btn>
                  </v-col>
                </v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-dialog>
      <!-- dialogInsert END -->
      <v-col cols="3"
        ><v-text-field
          v-model="list_of_New_at"
          class="text-red"
          variant="underlined"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-col>
      <v-col cols="1" class="d-flex align-end">
        <i class="fa-solid fa-magnifying-glass iconsearch"></i>
      </v-col>
      <v-col cols="12">
        <v-card>
          <v-table>
            <thead>
              <tr>
                <th class="text-center" width="80px">No.</th>
                <th class="text-center" width="150px">Image</th>
                <th>Title</th>
                <th>Video Name</th>
                <th>Video Link</th>
                <th class="text-center" width="250px">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-if="resultQuery == '' || resultQuery == null">
                <td colspan="6" class="text-center"><h3>No Data</h3></td>
              </tr>
              <tr v-else v-for="(item,index) in resultQuery" :key="item.id">
                <th class="text-center">{{ index+1 }}</th>
                <td><div class="p-2"><v-img :src="'./images/images-news-and-activities/'+ item.image" width="120px" height="120px" class="border" cover/></div></td>
                <td>{{ item.title }}</td>
                <td>{{ item.videoName }}</td>
                <td>{{ item.videoLink }}</td>
                <td class="text-center">
                  <v-btn variant="text" class="text-blue" @click="dialogview = true,getDetail(item.id)">
                    <i class="fa-solid fa-eye"></i>
                  </v-btn>

                  <v-btn
                    variant="text"
                    class="text-yellow-darken-3 mx-3"
                    @click="dialogedit = true,getDetail(item.id)"
                  >
                    <i class="fa-solid fa-file-pen"></i>
                  </v-btn>

                  <v-btn variant="text" class="text-red" @click="deleteDetail(item.id,item.title)">
                    <i class="fa-solid fa-trash"></i>
                  </v-btn>
                </td>
              </tr>
            </tbody>
          </v-table>
        </v-card>
      </v-col>
    </v-row>
  </v-main>
  <!-- dialog view -->
  <v-dialog v-model="dialogview" width="auto">
    <v-card>
      <v-toolbar
        class="text-center text-white"
        color="#00D1FF"
        title="VIEW INTO NEWS & ACTIVITIES"
      ></v-toolbar>
      <v-card-text>
        <v-container>
          <v-row class="d-flex align-center">
            <v-col cols="1">
              <v-text-field label="ID :" :model-value="list_of_Detail.id" variant="underlined" readonly></v-text-field>
            </v-col>
            <v-col cols="11">
              <v-text-field label="Title :" :model-value="list_of_Detail.title" variant="underlined" readonly></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field label="Video Name :" :model-value="list_of_Detail.videoName" variant="underlined" readonly></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field label="YouTube Link :" :model-value="list_of_Detail.videoLink" variant="underlined" readonly></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-textarea label="Description :" :model-value="list_of_Detail.description" variant="underlined" readonly></v-textarea>
            </v-col>
            <v-col cols="6">
              <v-text-field label="Create Date :" :model-value="list_of_Detail.created_at" variant="underlined" readonly></v-text-field>
            </v-col>
            <v-col cols="6">
              <v-text-field label="Update Date :" :model-value="list_of_Detail.updated_at" variant="underlined" readonly></v-text-field>
            </v-col>
            <div class="mt-2 px-3">Front Cover</div>
            <v-col cols="12">
                <v-img :src="(list_of_Detail.image == null || list_of_Detail.image == '')? noImageFC:'./images/images-news-and-activities/' + list_of_Detail.image" alt="" class="border" width="200px" height="200px" cover></v-img>
            </v-col>
            <v-divider :thickness="2" class="my-3" color="brack"></v-divider>
            <div class="px-3">Gallery Images</div>
            <v-col cols="12">
              <v-row>
                <v-col cols="6" sm="4" md="3" v-for="i in 6">
                  <div>
                    <v-img :src="app_url + '/images/01.jpg'" alt="" width="200px" height="200px" cover></v-img>
                  </div>
                </v-col>
              </v-row>
            </v-col>
            <!-- <v-divider :thickness="2" class="my-3" color="brack"></v-divider> -->
          </v-row>
        </v-container>
      </v-card-text>
    </v-card>
  </v-dialog>
  <!-- dialog view END -->

  <!-- dialog edit -->
  <v-dialog v-model="dialogedit" width="auto">
    <v-card>
      <v-toolbar
        class="text-center text-white"
        color="#F9A825"
        title="EDIT INTO NEWS & ACTIVITIES"
      ></v-toolbar>
      <v-card-text>
        <v-container>
          <v-row class="d-flex align-center">
            <v-col cols="12">
              <v-text-field label="Title" variant="solo" color="#D50703" placeholder="Title..." v-model="dataNew_at.title" required></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field label="Video Name" variant="solo" color="#D50703" placeholder="Video Name..." v-model="dataNew_at.videoName" required></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field label="YouTube Link" variant="solo" color="#D50703" placeholder="YouTube Link..." v-model="dataNew_at.videoLink" required></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-textarea label="Description" variant="solo" color="#D50703" placeholder="Description..." v-model="dataNew_at.description" required></v-textarea>
            </v-col>
            <v-col cols="12">
              <v-file-input label="Choose File" class="d-none" id="editImageFC" @change="editfileChangeFC" v-model="new_at.image" required ></v-file-input>
              <div>Front Cover</div>
              <div class="my-2"><label for="editImageFC"><v-img :src="editImageFC" width="200px" height="200px" class="border cursor" cover /></label></div>
            </v-col>
            <v-divider :thickness="2" class="my-3" color="brack"></v-divider>

            <v-col cols="12">
              <v-file-input label="Choose File" class="d-none" id="editImageGL" @change="fileChangeGL"></v-file-input>
              <div>Gallery Images</div>
              <div class="my-2"><label for="editImageGL"><v-img :src="noImageGL" width="200px" height="200px" class="border cursor me-5" cover/></label></div>
            </v-col>
            <v-divider :thickness="2" class="my-3" color="brack"></v-divider>
            <v-col cols="12" class="text-center">
              <v-btn color="#F9A825" class="text-white me-5" width="100px" @click="updateDetail(list_of_Detail.id), dialogedit = false">
                Update
              </v-btn>
              <v-btn color="#F44336" class="text-white" width="100px" @click="dialogedit = false">
                Cancle
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
    </v-card>
  </v-dialog>
  <!-- dialog edit END -->
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import { useDateFormat,useNow } from "@vueuse/core"; 

export default {
  data() {
    return {
      new_at:[{
        'title': '',
        'videoName': '',
        'videoLink': '',
        'description': '',
        'image': '',
        'imageGL': [],
      }],
      dataNew_at:[{}],
      dialoginsert: false,
      dialogview: false,
      dialogedit: false,
      list_of_New_at:null,
      list_of_Detail:[],
      noImage:'./images/noimg.jpg',
      noImageFC:'./images/noimg.jpg',
      noImageGL:'./images/noimg.jpg',
      imageGL:null,
      editImageFC:'',
    };
  },

  // Get All New and Activities
  mounted(){
    this.getDataDetail();
  },

  methods: {
    getDataDetail(){
      axios.get('/New_at').then((response)=>{
        this.new_at = response.data;
        // this.list_of_New_at = response.data;
      });
    },
     
    // Insert New and Activities Data
    saveData() {
      // console.log('Choose File Image=======>' + response.data);
      const formData = new FormData();
      formData.set('title', this.new_at.title);
      formData.set('videoName', this.new_at.videoName);
      formData.set('videoLink', this.new_at.videoLink);
      formData.set('description', this.new_at.description);
      formData.set('image', this.new_at.image);

      axios.post('/New_at', formData).then((response)=>{
        console.log(response.data[1]);
        Swal.fire({
          icon: 'success',
          title: 'Insert ' + response.data[1].title + ' Successfully',
        });
        this.getDataDetail();
      }).catch(({response})=>{
        // console.log('Preview Data =======>' + this.new_at.image);
        if(response.data === 422){
          setValidationError(response.data.errors);
        }else{
          Swal.fire({
            icon: 'error',
            text: response.data.message,
          })
        }
      })
      this.new_at = {
        'title': '',
        'videoName': '',
        'videoLink': '',
        'description': '',
        'image': '',
      }
    },

    // Preview Image Front Cover
    fileChangeFC(e){
      const fileFC = e.target.files[0];
      this.new_at.image = e.target.files[0];
      this.noImageFC = URL.createObjectURL(fileFC);
      // console.log('==========>'+this.new_at.image);
    },
    // Edit Preview Image Front Cover
    editfileChangeFC(e){
      const fileFC = e.target.files[0];
      this.dataNew_at.image = e.target.files[0];
      this.editImageFC = URL.createObjectURL(fileFC);
      // console.log('==========>'+this.new_at.image);
    },

    // Preview Image Gallery
    fileChangeGL(e){
      if(e.target.files.length > 0){
        let fileImg = [];
        for( let i = 0; i < e.target.files.length;i++){
          fileImg[i] = URL.createObjectURL(e.target.files[i]);
        }
        this.imageGL = fileImg;
      }
      // console.log(e.target.files[length].name);
      // let fileGL = e.target.files[length];
      // this.imageGL = URL.createObjectURL(fileGL);
    },

    // Clear From Insert New and Activities
    clear(){
      this.new_at = {
        'title': '',
        'videoName': '',
        'videoLink': '',
        'description': '',
        'image': '',
      }
    },

    // Get New and Activities Detail By ID
    getDetail($id){
      axios.get('/New_at/'+ $id).then((response)=>{
        this.list_of_Detail = response.data;
        this.dataNew_at = response.data;
        if(this.dataNew_at.image == null || this.dataNew_at.image == ''){
          this.editImageFC = './images/noimg.jpg';
        }else{
          this.editImageFC = './images/images-news-and-activities/' + this.dataNew_at.image;
        }
        // console.log('============>'+this.editImageFC);
      });
    },

    // Update New and Activities Detail By ID
    updateDetail($id){
      const formData = new FormData();
      formData.set('title', this.dataNew_at.title);
      formData.set('videoName', this.dataNew_at.videoName);
      formData.set('videoLink', this.dataNew_at.videoLink);
      formData.set('description', this.dataNew_at.description);
      formData.set('image', this.dataNew_at.image);

      axios.put('/New_at/'+ $id, formData).then((response)=>{
        Swal.fire({
          icon: 'success',
          title: 'Update!',
          text: 'Update ' + response.data[1].title + ' Successfully',
        });
        this.getDataDetail();
      });
      // console.log('=========>'+ $id + '   ' + this.dataNew_at.title);
    },

    // Delete New and Activities Detail By ID
    deleteDetail($id,$title){
      Swal.fire({
        title: 'Are you sure?',
        text: "Delete " + $title,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete('/New_at/'+ $id).then((response)=>{
            this.getDataDetail();
          });
          Swal.fire(
            'Deleted!',
            'Deleted ' + $title + ' Successfully',
            'success'
          )
        }
      })
    },
  },
  computed: {
      resultQuery() {
        if (this.list_of_New_at) {
          return this.new_at.filter((item) => {
            return this.list_of_New_at.toLowerCase().split(' ').every(v => item.title.toLowerCase().includes(v)) ||
              this.list_of_New_at.toLowerCase().split(' ').every(v => item.videoName.toLowerCase().includes(v))
          })
        } else {
          return this.new_at;
        }
      }
    }
  
};
</script>
<style></style>

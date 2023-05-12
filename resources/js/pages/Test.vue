<template>
  <div class="container pt-5">
    <div class="card mt-5 p-3">
      <div class="gard-title">
        <h1>Upload Image</h1>
      </div>
      <div class="gard-body">
        <!-- <form @submit.prevent="seveData"> -->
          <div class="row">
            <div class="col-6">
              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control" id="image" @change="getImage">
              <div class="mt-5">
                <v-img :src="noImage" width="200px" height="200px" class="border" cover/>
              </div>
            </div>
            <div class="col-6">
              <label for="type_image" class="form-label">Type Image</label>
              <input type="txet" class="form-control" v-model="fdata.imagesType" placeholder="Enter youe Image Type" readonly>
            </div>
            <div class="text-center mt-5">
              <button type="button" @click="seveData" class="btn btn-success">Submit</button>
            </div>
          </div>
        <!-- </form> -->
      </div>
    </div>
    <div class="card mt-5 p-3">
      <div class="gard-title text-center">
        <h1>Data ALL</h1>
      </div>
      <div class="gard-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image</th>
              <th scope="col">Images Type</th>
              <th scope="col">Created at</th>
              <th scope="col">Updated at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="dataImages == '' || dataImages == null">
              <td colspan="6" class="text-center">No Data</td>
            </tr>
            <tr v-for="(item,index) in dataImages">
              <th>{{ index+1 }}</th>
              <td><div class="p-2"><v-img :src="'./image_test/'+ item.imagesPath" width="100px" height="100px" class="border" cover/></div></td>
              <td>{{ item.imagesType }}</td>
              <td>{{ item.created_at }}</td>
              <td>{{ item.updated_at }}</td>
              <td><button type="button" class="btn btn-primary">view</button></td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';

// let txt_file = document.getElementById('image');
// console.log('text File image ====>' + txt_file);


export default{
  data: () => ({
    noImage:'./images/noimg.jpg',
    'fdata':{
      'imagesPath':'',
      'imagesType':'testImages'
    },
    dataImages:[],
  }),
  mounted(){
    this.getImageProject();
  },
  methods:{
    // resetForm(){
    //   let txt_file = document.getElementById('image');
    //   this.txt_file = null;
    // },
    getImageProject(){
      axios.get('/images_project').then((response)=>{
        this.dataImages = response.data;
      });
    },
    getImage(e){
      let file = e.target.files[0];
      this.fdata.imagesPath = e.target.files[0];
      this.noImage = URL.createObjectURL(file);
      // console.log('Preview Data =======>' + this.fdata.imagesPath);
    },

    seveData(){
      const formData = new FormData();
      formData.set('imagesPath',this.fdata.imagesPath);
      formData.set('imagesType',this.fdata.imagesType);
      // console.log('Preview Data =======>' + this.fdata.imagesType);
      axios.post('/images_project', formData ).then((response)=>{
        Swal.fire({
          icon: 'success',
          title: 'Insert Images Project '+ response.data[1].imagesType +' Successfully',
        });
        this.getImageProject();
       })
      .catch(({response})=>{
        // console.log('Preview Data =======>' + response);
        if(response.data === 422){
          setValidationError(response.data.errors);
        }else{
          Swal.fire({
            icon: 'error',
            text: response.data.message,
          })
        }
      });
    },
  }
};
</script>
<style scoped>
table > tbody > tr > th,td{
  vertical-align: middle;
}
</style>
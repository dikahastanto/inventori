<?php include 'template/header.php' ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard Kasir</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Transaksi Barang</div>
                <div class="panel-body">
                    <div id="app">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <input v-model="id_customer" @change="getdata" type="text" name="customer" class="form-control" placeholder="Id Customer"><br>
                                    <button @click="getdata" class="btn btn-primary" type="button">Cek Customer</button><br><br>
                                </div>
                                <div class="col-md-3">
                                    <input readonly id="nama" v-model="nama_customer" type="text" class="form-control" placeholder="Nama Customer"><br>
                                </div>
                                <div class="col-md-3">
                                    <input readonly id="diskon" v-model="diskon" type="text" class="form-control" placeholder="Diskon Customer"><br>
                                </div>
                            </div>
                            <div class="row" v-for="(b ,i) in barangs" :key="i">
                                <!-- <div class="col-md-3">
                                    <label>Id Barang</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input v-model="b.id_barang" value="b.id_barang" @change="get_barang(b.id_barang,i)" type="text" class="form-control" placeholder="Id Barang">
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-warning" type="button" @click="get_barang(b.id_barang,i)">Cek</button>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-md-3">
                                    <label>Nama Barang</label>
                                    <!-- <input v-model="b.nama_barang" type="text" :id="`nama_barang${i}`" class="form-control" placeholder="Nama Barang"><br> -->
                                    <vue-bootstrap-typeahead
                                        v-model="b.nama_barang"
                                        :data="list_barang"
                                        placeholder="Nama Barang"
                                        @hit="get_barang(b.nama_barang,i)"
                                        />
                                </div>
                                <div class="col-md-2">
                                    <label>No Batch</label>
                                    <input v-model="b.no_batch" readonly type="text" class="form-control" placeholder="No Batch"><br>
                                </div>
                                <div class="col-md-2">
                                    <label>Harga</label>
                                    <input v-model="b.harga" readonly :id="`harga${i}`" type="text" class="form-control" placeholder="Harga Barang"><br>
                                </div>
                                <div class="col-md-1">
                                    <label>Stock</label>
                                    <input v-model="b.stock" readonly :id="`stock${i}`" type="text" class="form-control" placeholder="Stock Barang"><br>
                                </div>
                                <div class="col-md-1">
                                    <label>Diskon</label>
                                    <input v-model="b.diskon" readonly :id="`diskon${i}`" type="text" class="form-control" placeholder="Stock Barang"><br>
                                </div>
                                <div class="col-md-2">
                                    <label>Jumlah Pembelian</label>
                                    <input v-model="b.jumlah" type="text" name="jumlah" class="form-control" placeholder="Jumlah"><br>
                                </div>
                                <div class="col-md-1">
                                <br>
                                    <button @click="hapus(i)" class="btn btn-danger" type="button">X</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" @click="tambah_barang">Tambah Barang</button>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Sub Total</label>
                                    <input readonly v-model="sub_total_transaksi" type="text" class="form-control" placeholder="Sub Total Transaksi">
                                </div>
                                <div class="col-md-3">
                                    <label>Total Potongan</label>
                                    <input readonly v-model="potongan" type="text" class="form-control" placeholder="Potongan">
                                </div>
                                <div class="col-md-3">
                                    <label>Total Transaksi</label>
                                    <input readonly v-model="total_transaksi" type="text" class="form-control" placeholder="Total Transaksi">
                                </div>
                                <div class="col-md-1">
                                    <br>
                                    <button type="button" class="btn btn-warning" @click="hitung">Hitung</button>
                                </div>
                                <div class="col-md-1">
                                    <br>
                                    <button @click="simpan" type="button" class="btn btn-success" >Proses</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<script src="vue/dist/vue.js"></script>
<script src="axios/dist/axios.js"></script>
<link href="https://unpkg.com/vue-bootstrap-typeahead/dist/VueBootstrapTypeahead.css" rel="stylesheet">
<script src="https://unpkg.com/vue-bootstrap-typeahead"></script>
<script>
    Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead)
    new Vue({
        el: '#app',
        component : VueBootstrapTypeahead,
        data : {
            query: '',
            list_barang : [],
            id_customer: '',
            nama_customer : '',
            diskon : 0,
            total_transaksi:0,
            sub_total_transaksi:0,
            potongan:0,
            barangs : [{
                id_barang : '',
                nama_barang : '',
                no_batch : '',
                harga : '',
                stock : '',
                jumlah : 0
            }]
        },
        created(){
            return new Promise(async (resolve,reject) => {
                    try {
                        const res = await axios.get("http://localhost/inventori/api/list_barang.php")
                        const data = res.data
                        if (data == null) {
                            alert('Terjadi kesalahan')
                        }else{
                            this.list_barang = data;
                            // console.log(this.list_barang)
                        }
                    } catch (error) {
                        console.log(error)
                    }
                })
        },
        methods: {
            getdata() {
                return new Promise(async (resolve,reject) => {
                    try {
                        const res = await axios.get("http://localhost/inventori/api/get_customer.php?id="+this.id_customer)
                        const data = res.data
                        if (data == null) {
                            alert('Id Customer salah/tidak terdaftar!')
                            this.nama_customer = ''
                            this.diskon = 0
                        }else{
                            this.nama_customer = data.nama
                            this.diskon = data.diskon
                        }
                    } catch (error) {
                        console.log(error)
                    }
                })
            },
            tambah_barang(){
                this.barangs.push({
                    id_barang : '',
                    nama_barang : '',
                    no_batch : '',
                    harga : '',
                    stock : '',
                    jumlah : 0
                })
            },
            get_barang(nama,i){
                
                return new Promise(async (resolve,reject) => {
                    try {
                        const res = await axios.get("http://localhost/inventori/api/get_barang.php?nama="+nama);
                        const data = res.data
                        if (data == null) {
                            alert('Id Barang salah/tidak terdaftar!')
                        }else{
                            this.barangs[i].nama_barang = data.nama
                            this.barangs[i].no_batch = data.no_batch
                            this.barangs[i].harga = data.harga
                            this.barangs[i].stock = data.stock
                            this.barangs[i].diskon = data.diskon
                        }
                    } catch (error) {
                        
                    }
                })
            },
            hapus(id){
                this.barangs.splice(id,1)
                
            },
            hitung(){

                var total_transaksi=0
                var sub_total_transaksi=0
                // var potongan=0
                // var potongan_barang=0
                var sub_potongan=0
                var total_sebelum_potongangan_barang=0

                for (let index = 0; index < this.barangs.length; index++) {

                    if (this.barangs[index].jumlah == 0) {
                        
                        return alert('Masukan Data Pembelian')

                    }else{
                        if (parseInt(this.barangs[index].stock) < parseInt(this.barangs[index].jumlah)) {

                            this.sub_total_transaksi = ''
                            $('#total_transaksi').val("");
                            return alert('Stock '+ this.barangs[index].nama +' Tidak mencukupi')

                        }else{
                            var potongan_barang = (this.barangs[index].harga) * this.barangs[index].diskon/100
                            sub_potongan += potongan_barang

                            var harga_sebelum_potong = this.barangs[index].harga * this.barangs[index].jumlah
                            total_sebelum_potongangan_barang += harga_sebelum_potong

                            var sub_total = harga_sebelum_potong - potongan_barang
                            sub_total_transaksi += sub_total

                        }
                    }
                    
                }
                this.sub_total_transaksi = total_sebelum_potongangan_barang
                this.potongan = sub_potongan + (total_sebelum_potongangan_barang * (this.diskon/100))
                this.total_transaksi = this.sub_total_transaksi - this.potongan
            },
            simpan(){
                const form_data = new FormData();
                form_data.append('id_customer' , this.id_customer)
                form_data.append('nama_customer' , this.nama_customer)
                form_data.append('diskon_customer' , this.diskon)
                form_data.append('barangs' , JSON.stringify(this.barangs))
                form_data.append('sub_total' , this.sub_total_transaksi)
                form_data.append('potongan' , this.potongan)
                form_data.append('total_transaksi' , this.total_transaksi)
                axios.post('http://localhost/inventori/api/insert_transaksi.php',form_data)
                .then(result => {
                    console.log(result)

                    if(result.data.error == false){
                        window.location= 'cetak_faktur.php?no_faktur='+result.data.id_transaksi
                    }

                }).catch(err => {
                    console.log(err)
                })
            }
            
        }
    }).$mount('#app');
</script>
<?php include '../template/footer.php' ?>
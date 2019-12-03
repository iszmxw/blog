<template>
    <el-dialog title="添加导航栏" :visible.sync="dialogFormVisible" width="45%">
        <el-form ref="form" :model="form" label-width="100px">
            <el-form-item label="上级导航栏">
                <el-select v-model="form.pid" placeholder="请选择上级导航栏">
                    <el-option label="区域一" value="shanghai"></el-option>
                    <el-option label="区域二" value="beijing"></el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="导航栏设置">
                <el-checkbox-group v-model="form.type">
                    <el-checkbox label="隐藏栏目" name="type"></el-checkbox>
                    <el-checkbox label="新窗口打开" name="type"></el-checkbox>
                    <el-checkbox label="设置根目录" name="type"></el-checkbox>
                </el-checkbox-group>
            </el-form-item>
            <el-form-item label="导航栏名称">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item label="导航栏ICON">
                <el-input v-model="form.icon"></el-input>
            </el-form-item>
            <el-form-item>
                <el-tabs type="border-card" v-model="activeName" @tab-click="handleSwitch">
                    <el-tab-pane>
                        <span slot="label"><i class="el-icon-s-tools"></i> 系统地址</span>
                        <el-select v-model="form.pid" placeholder="请选择上级导航栏" style="width:100%">
                            <el-option label="区域一" value="shanghai"></el-option>
                            <el-option label="区域二" value="beijing"></el-option>
                        </el-select>
                    </el-tab-pane>
                    <el-tab-pane>
                        <span slot="label"><i class="el-icon-link"></i> 手动输入</span>
                        <el-input v-model="form.name" placeholder="请输入地址"></el-input>
                    </el-tab-pane>
                </el-tabs>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">立即创建</el-button>
                <el-button @click="dialogFormVisible = false">取消</el-button>
            </el-form-item>
        </el-form>
    </el-dialog>
</template>

<script>
    export default {
        name: "Navbarlist",
        data: function () {
            return {
                dialogFormVisible: false,
                activeName: true,
                form: {
                    pid: 0,
                    type: 0,
                    name: 0,
                    icon: 0,
                }
            }
        },
        methods: {
            handleSwitch() {
                console.log(11);
            },
            onSubmit() {
                console.log('onSubmit');
            }
        }
    }
</script>

<style scoped>

</style>
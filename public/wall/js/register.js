var personArray = new Array();
var CurPersonNum = 0;
var ini = 0;
// 随机animate动画库
var _in = ['bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','fadeIn','fadeInDown','fadeInDownBig','fadeInLeft','fadeInLeftBig','fadeInRight','fadeInRightBig','fadeInUp','fadeInUpBig','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','slideInDown','slideInLeft','slideInRight'];
var _out = ['bounceOut','bounceOutDown','bounceOutLeft','bounceOutRight','bounceOutUp','fadeOut','fadeOutDown','fadeOutDownBig','fadeOutLeft','fadeOutLeftBig','fadeOutRight','fadeOutRightBig','fadeOutUp','fadeOutUpBig','rotateOut','rotateOutDownLeft','rotateOutDownRight','rotateOutUpLeft','rotateOutUpRight','slideOutDown','slideOutLeft','slideOutRight'];
// 模拟推送数据
var s = setInterval(function(){
    // 随机获取animate动画
    var rand_in = parseInt(Math.random() * _in.length,10);
    var rand_out = parseInt(Math.random() * _out.length,10);
    if(CurPersonNum >= personArray.length){
        CurPersonNum = 0;
    }
//					//定时执行检查数据库的用户签到数据，有则加入到签到墙
//                $('.show_info').show();
//                $('.show_info').addClass(_in[rand_in]);
//                setTimeout(function(){
//                    $('.show_info').removeClass(_in[rand_in]);
//                    // 更改展示的图片
//                    var img = document.getElementsByClassName('element')[CurPersonNum].getElementsByTagName('img')[0];
//                    img.setAttribute('src','img/1.jpg');
//                    console.log(img);
//                    ++CurPersonNum;
//                    setTimeout(function(){
//                        $('.show_info').addClass(_out[rand_out]);
//                        setTimeout(function(){
//                            $('.show_info').removeClass(_out[rand_out]);
//                            $('.show_info').hide();
//                        },1000);
//                    },1500);
//                },1000);
},4500);

// 生成虚拟数据
$.get('http://blog.54zm.com/wall/get_user_list',function (json) {
    if(json.length < 168){
        for(var _i=0;_i<29;_i++){
            for (index in json){
                personArray.push({
                    image: json[index].header_img
                });
            }
        }
    }else{
        for (index in json){
            personArray.push({
                image: json[index].header_img
            });
        }
    }
    // console.log(personArray);
});
//可以换成数据库里面的真实数据
// for(var _i=0;_i<6;_i++){
//     for(var i=1;i<29;i++){
//         personArray.push({
//             image: "img/"+ i +".jpg"
//         });
//     }
// }

var table = new Array();
for (var i = 0; i < personArray.length; i++) {
    table[i] = new Object();
    if (i < personArray.length) {
        table[i] = personArray[i];
        table[i].src = personArray[i].image;
    }
    table[i].p_x = i % 20 + 1;
    table[i].p_y = Math.floor(i / 20) + 1;
}
console.log('分割线');
console.log(personArray);
console.log('分割线');
var camera, scene, renderer;
var controls;

var objects = [];
var targets = { table: [], sphere: [], helix: [], torus: [], grid: [] };

init();
animate();

function init() {

    camera = new THREE.PerspectiveCamera( 40, window.innerWidth / window.innerHeight, 1, 10000 );
    camera.position.z = 3000;

    scene = new THREE.Scene();

    // 表格状态

    for ( var i = 0; i < table.length; i ++ ) {

        var element = document.createElement( 'div' );
        element.className = 'element';
        element.style.backgroundColor = 'rgba(0,127,127,' + ( Math.random() * 0.5 + 0.25 ) + ')';

        var img = document.createElement('img');
        img.src = table[ i ].image;
        console.log(table[ i ].image);
        element.appendChild( img );


        var object = new THREE.CSS3DObject( element );
        object.position.x = Math.random() * 4000 - 2000;
        object.position.y = Math.random() * 4000 - 2000;
        object.position.z = Math.random() * 4000 - 2000;
        scene.add( object );

        objects.push( object );

        // 表格需要坐标进行排序的
        var object = new THREE.Object3D();
        object.position.x = ( table[ i ].p_x * 140 ) - 1330;
        object.position.y = - ( table[ i ].p_y * 180 ) + 990;

        targets.table.push( object );

    }

    // 球形状态
    var vector = new THREE.Vector3();
    var spherical = new THREE.Spherical();

    for ( var i = 0, l = objects.length; i < l; i ++ ) {

        var phi = Math.acos( -1 + ( 2 * i ) / l );
        var theta = Math.sqrt( l * Math.PI ) * phi;

        var object = new THREE.Object3D();

        spherical.set( 800, phi, theta );

        object.position.setFromSpherical( spherical );

        vector.copy( object.position ).multiplyScalar( 2 );

        object.lookAt( vector );

        targets.sphere.push( object );

    }

    // 螺旋状态
    var vector = new THREE.Vector3();
    var cylindrical = new THREE.Cylindrical();

    for ( var i = 0, l = objects.length; i < l; i ++ ) {

        var theta = i * 0.175 + Math.PI;
        var y = - ( i * 5 ) + 450;

        var object = new THREE.Object3D();

        // 参数一 圈的大小 参数二 左右间距 参数三 上下间距
        cylindrical.set( 900, theta, y );

        object.position.setFromCylindrical( cylindrical );

        vector.x = object.position.x * 2;
        vector.y = object.position.y;
        vector.z = object.position.z * 2;

        object.lookAt( vector );

        targets.helix.push( object );

    }

    // 蜘蛛网状态torus
    var vector = new THREE.Vector3();

    for ( var i = 0, l = objects.length; i < l; i ++ ) {

        var object = new THREE.Object3D();

        object.position.x = 1200*Math.cos(-i);
        object.position.y = 1200*Math.sin(-i);
        object.position.z = 200-i*60*1.5;
        object.rotation.z = -i*0.03;

        //vector.copy( object.position ).multiplyScalar( 2 );

        object.lookAt( vector );

        targets.torus.push( object );

    }


    // 格子状态
    for ( var i = 0; i < objects.length; i ++ ) {

        var object = new THREE.Object3D();

        object.position.x = ( ( i % 5 ) * 400 ) - 800; // 400 图片的左右间距  800 x轴中心店
        object.position.y = ( - ( Math.floor( i / 5 ) % 5 ) * 300 ) + 500;  // 500 y轴中心店
        object.position.z = ( Math.floor( i / 25 ) ) * 200 - 800;// 300调整 片间距 800z轴中心店

        targets.grid.push( object );

    }

    //渲染
    renderer = new THREE.CSS3DRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    renderer.domElement.style.position = 'absolute';
    document.getElementById( 'container' ).appendChild( renderer.domElement );

    // 鼠标控制
    controls = new THREE.TrackballControls( camera, renderer.domElement );
    controls.rotateSpeed = 0.5;
    controls.minDistance = 500;
    controls.maxDistance = 6000;
    controls.addEventListener( 'change', render );

    // 自动更换
    setInterval(function(){
        ini = ini >= 4 ? 0 : ini;
        ++ini;
        switch(ini){
            case 1:
                transform( targets.sphere,"sphere", 1000 );
                break;
            case 2:
                transform( targets.helix,"helix", 1000 );
                break;
            case 3:
                transform( targets.torus,"torus", 1000 );
                break;
            case 4:
                transform( targets.grid,"grid", 1000 );
                break;
        }
    },8000);

    //点击切换图形状态
    // var button = document.getElementById( 'table' );
    // button.addEventListener( 'click', function ( event ) {
    //     transform( targets.table, 1000 );
    // }, false );
    //
    // var button = document.getElementById( 'sphere' );
    // button.addEventListener( 'click', function ( event ) {
    //     transform( targets.sphere, 2000 );
    // }, false );
    //
    // var button = document.getElementById( 'helix' );
    // button.addEventListener( 'click', function ( event ) {
    //     transform( targets.helix, 2000 );
    // }, false );
    //
    // var button = document.getElementById( 'grid' );
    // button.addEventListener( 'click', function ( event ) {
    //     transform( targets.grid, 2000 );
    // }, false );

    transform( targets.sphere,"sphere", 2000 );

    //

    window.addEventListener( 'resize', onWindowResize, false );

}

function transform( targets,style, duration ) {

    TWEEN.removeAll();

    console.log(style);

    for ( var i = 0; i < objects.length; i ++ ) {

        var object = objects[ i ];
        var target = targets[ i ];
        new TWEEN.Tween( object.position )
            .to( { x: target.position.x, y: target.position.y, z: target.position.z }, Math.random() * duration + duration )
            .easing( TWEEN.Easing.Exponential.InOut )
            .start();

        new TWEEN.Tween( object.rotation )
            .to( { x: target.rotation.x, y: target.rotation.y, z: target.rotation.z }, Math.random() * duration + duration )
            .easing( TWEEN.Easing.Exponential.InOut )
            .start();

    }

    new TWEEN.Tween( this )
        .to( {}, duration * 2 )
        .onUpdate( render )
        .start();

}

function onWindowResize() {

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize( window.innerWidth, window.innerHeight );

    render();

}

function animate() {

    // 让场景通过x轴或者y轴旋转  & z
    //判断是否为蜘蛛网状态
    if (ini == '3'){
        scene.rotation.x = 0;
        scene.rotation.y = 0;
        scene.rotation.z += 0.008;
    }else{
        scene.rotation.x = 0;
        scene.rotation.y += 0.008;
        scene.rotation.z = 0;
    }
    // if (scene.scale.x <1){
    //     console.log("增大中");
    //     scene.scale.x += 0.008;
    //     scene.scale.y += 0.008;
    //     scene.scale.z += 0.008;
    // }else if (scene.scale.x >3){
    //     console.log("缩小中");
    //     scene.scale.x = scene.scale.x-0.008;
    //     scene.scale.y = scene.scale.y-0.008;
    //     scene.scale.z = scene.scale.z-0.008;
    // }

    requestAnimationFrame( animate );

    TWEEN.update();

    controls.update();

    // 渲染循环
    render();

}

function render() {

    renderer.render( scene, camera );

}

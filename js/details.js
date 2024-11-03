let Virtual_assistent = {
    'title' : 'Virtual Assistent',
    'details' : "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae voluptate tenetur possimus ex minus. Dolore fugiat laborum dignissimos? Temporibus beatae alias quam culpa doloribus sed laborum harum cum, repellendus vel facere, hic maiores quidem laboriosam distinctio consequuntur excepturi omnis similique explicabo eveniet animi inventore odit? Tempore magni tenetur est mollitia, totam aliquid. Sit ut fugiat voluptatum, asperiores, cupiditate repudiandae tempore ipsa natus illo repellendus quisquam quos qui laboriosam omnis dolorum ad earum sint dolor eum quod excepturi, ducimus deleniti! Dolorum quaerat sunt iure, enim maxime quae ullam dolores dolor nisi cum illum obcaecati iusto voluptatum totam odio fugit, ab commodi!",
    'features' : ['Search Info from internet', 'Play youtube with voice comand', 'Realtime update about time and place', 'Jokes for time pass', 'and so more'],
    'isVideoAvailable' : true,
    'video' : 'https://www.youtube.com/embed/ViZtKUgJHMQ',
    'images' : ['anannaya.jpg','virtual.jpeg', 'googlephotoshare.jpeg']
};
let data = {
    'virtual assistent' : Virtual_assistent
};
// const item = sessionStorage.getItem("viewItem");    ...> , 'blockchain.png'
const item = "virtual assistent";

if(data[item] !== undefined){
    document.getElementById("title").innerText = data[item].title;
    document.getElementById("details").innerText = data[item].details;
    let html = '';
    data[item].features.forEach(element => {
        html += `<li>${element}</li>`;
    })
    document.getElementById("featureList").innerHTML = html;

    if(data[item].isVideoAvailable){
        document.getElementById("iframe").src = data[item].video;
    }

    let i = 1;
    data[item].images.forEach(element => {
        document.getElementById("src-"+i).src = "../images/"+element;
        i++;
    })
}

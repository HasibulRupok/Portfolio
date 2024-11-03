document.getElementById("educationBtn").addEventListener('click', function () {
    activeMe(1);
});

document.getElementById("experienceBtn").addEventListener('click', function () {
    activeMe(2);
});

document.getElementById("awardBtn").addEventListener('click', function () {
    activeMe(3);
});
document.getElementById("publicationBtn").addEventListener('click', function () {
    activeMe(4);
});

function activeMe(id) {
    if (id == 0) return;
    const buttons = ['N/A', 'educationBtn', 'experienceBtn', 'awardBtn', 'publicationBtn'];
    const tabs = ['N/A', 'educationTab', 'experienceTab', 'awardTab', 'publicationTab'];

    const experienceTab = document.getElementById(tabs[id]);
    if (experienceTab.style.display === 'none') {
        let i = 1;
        for (i = 1; i < tabs.length; i++) {
            if (i == id) continue;

            let tab = '#' + tabs[i];
            let btn = '#' + buttons[i];

            $(tab).css("display", "none");
            $(btn).removeClass("activeExpButton");
        }
        let tab = '#' + tabs[id];
        let btn = '#' + buttons[id];
        $(tab).css("display", "block");
        $(btn).addClass("activeExpButton");
        return;
    }
}
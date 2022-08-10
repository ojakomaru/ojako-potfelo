//headerとページトップボタンを画面に出現＆fixedにする
const header      = document.getElementById("header");
const pageTopBtn  = document.getElementById("scroll_top");
const serviceLink = document.getElementById("product_link");
const key_visual  = document.getElementById("key_visual");
document.addEventListener("scroll", () => {
  if (key_visual.getBoundingClientRect().bottom < 0) {
    header.classList.add("active");
    pageTopBtn.classList.add("show");
    serviceLink ? serviceLink.classList.add("show") : null ;
  } else {
    pageTopBtn.classList.remove("show");
    serviceLink ? serviceLink.classList.remove("show") : null;
  }
})

//ページトップスムーススクロール
const pageTopScroll = document.getElementById('scroll_top');
pageTopScroll.addEventListener('click',() => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
})

//sidebar目録をfixedにする
const sidebar = document.getElementById("pc_nav");
const taglist = document.getElementById("taglist");
window.addEventListener("scroll", function() {
  if(taglist) {
    const taglistDistance = taglist.getBoundingClientRect().bottom + taglist.clientHeight * .1;
    if ( taglistDistance < 0 ) {
      sidebar.classList.add("fix");
    } else {
      sidebar.classList.remove("fix");
    }
  }
})

//keyframeDelay関数（ID要素、時間）
const keyframeDelayText = (targetElementID,time = 0.16) => {
  const animationElement = document.getElementById(targetElementID);
  if (animationElement) {
    const animationTexts = animationElement.textContent;
    animationArray = [];
    animationElement.textContent = "";
    animationTexts.split("").forEach((anitex,j) => {
      if (anitex === 'オ') {
        animationArray.push('<span style="animation-delay: ' + (j * time) + 's;"><br>' + anitex + '</span>');
      } else {
        animationArray.push('<span style="animation-delay: ' + (j * time) + 's;">' + anitex + '</span>');
      }
      });
    animationArray.forEach(animationText => {
      animationElement.innerHTML += animationText;
    })
  }
}
keyframeDelayText("animation-text");
keyframeDelayText("welcome-text",0.56);
time = 0.24;
keyframeDelayText("taxonomy-text",time);
keyframeDelayText("proposing_1",0.15);
keyframeDelayText("proposing_2",0.15);



//出現アニメーション関数（"クラス名",出現タイミング）
const addShowContents = (elements,margin = 0.6, boolean = false) => {
  window.addEventListener("scroll",function() {
    const showElements = document.querySelectorAll(elements);
    for (let i = 0; i < showElements.length; i++) {
      const elementDistance = showElements[i].getBoundingClientRect().top + showElements[i].clientHeight * margin;
      if (window.innerHeight > elementDistance){
        showElements[i].classList.add("show");
      } else if (boolean) {
        showElements[i].classList.remove("show");
      }
    }
  })
}
addShowContents(".active_head");
addShowContents(".active_greeting");
addShowContents(".greeting_img");
addShowContents(".item_detail");
addShowContents(".skill_graph");
addShowContents(".post_cade",0.3);
addShowContents(".sp_frame",0.5);
addShowContents(".pc_frame",0.3);
addShowContents(".main_item_text",0.2);
addShowContents(".item_about");
addShowContents("#proposing_1", 1.6);
addShowContents("#proposing_2", 1.6);

//アコーディオンタブスイッチ
const accoTabs   = document.querySelectorAll(".acco_tav");
const insideText = document.querySelectorAll(".acco_tav .inside_text");
for (let i = 0; i < accoTabs.length; i++) {
  accoTabs[i].addEventListener("click",function() {
    insideText[i].classList.toggle("open");
    accoTabs[i].classList.toggle("open");
  })
}

//グラフ割合表示
const showPercent = () =>{
  const barGraph = document.querySelectorAll(".skill_graph .bar");
  for (let i = 0; i < barGraph.length; i++) {
    const graphAfter = window.getComputedStyle(barGraph[i],'::after');
    const graphWidth = graphAfter.maxWidth;
    span = document.createElement("span");
    span.textContent = graphWidth;
    barGraph[i].appendChild(span);
  }
}
const skill_graph = document.getElementById("skill_graph");
if(skill_graph) {
  skill_graph.addEventListener("transitionend",function(){
    setTimeout(showPercent,3100);
  })
}
//CSS追加関数（’クラス’,CSS指定変数）
const addStyle = (Selector,styleString) => {
  document.styleSheets[0].addRule(Selector, styleString);
}
let styleString = 'content:" ";';
addStyle('.bar::after', styleString);

//タブ切り替えスイッチ
const tabElements      = document.querySelectorAll(".wp_tabs li a");
const contentsElements = document.querySelectorAll(".wp_contents .merit");
for (let i = 0; i < tabElements.length; i++) {
  tabElements[i].addEventListener("click",function(e) {
    e.preventDefault();
    for (let j = 0; j < tabElements.length; j++) {
      tabElements[j].classList.remove("active");
      contentsElements[j].classList.remove("active");
    }
    this.classList.add("active");
    contentsElements[i].classList.add("active");
  })
}

//モーダルウィンドウ
const modalOpen  = document.getElementById("modal_open");
const modalClose = document.getElementById("modal_close");
const modal      = document.getElementById("modal");
const mask       = document.getElementById("mask");
if(modalOpen){
  modalOpen.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.add("active");
    mask.classList.add("active");
  })
}
const closeSwich = (element) => {
  element.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.remove("active");
    mask.classList.remove("active");
  })
}
if (modalClose) {
  closeSwich(modalClose);
}
if (mask) {
  closeSwich(mask);
}

//制作実績絞り込み
const productions = document.querySelectorAll(".production_kind li");
const proTerms    = document.querySelectorAll(".main_item_text h2");
const parentPost = (element) => {
  return element.parentNode.parentNode.parentNode.parentNode;
}
if (productions) {
  productions.forEach((production,p) => {
    production.addEventListener("click",() => {
      proTerms.forEach((term,t) => {
        parentPost(term).classList.remove("check");
        productions[t].classList.remove("check");
        if (production.textContent === term.textContent) {
          parentPost(term).classList.add("check");
        } else if (p === 0) {
          parentPost(term).classList.add("check");
        }
      });
      production.classList.add("check");
    });
  })
}

// シーケンシャルアニメーション
const sequentialAnimation = (timing = 400) => {
  const childElements = document.querySelectorAll(".sequential");
  childElements.forEach((animationItem, index) => {
    const order = index + 1;
    const delay = order * timing;
    setTimeout(() => {
      animationItem.classList.add("active");
    }, delay);
  });
}
const addShowAnimation = (elements, margin = 0.6,callback,timing) => {
  window.addEventListener("scroll", function () {
    const showElements = document.querySelectorAll(elements);
    for (let i = 0; i < showElements.length; i++) {
      const elementDistance =
        showElements[i].getBoundingClientRect().top +
        showElements[i].clientHeight * margin;
      if (window.innerHeight > elementDistance) {
        callback(timing);
      }
    }
  });
}
addShowAnimation(".introduction", 0.2, sequentialAnimation);
addShowAnimation(".production_kind", 0.4, sequentialAnimation,200);
addShowAnimation(".suggest_item", 0.4, sequentialAnimation);

// 目次の開閉スイッチ
const mokuziBotton = document.getElementById('mokuzi_show_toggle');
const mokuziContent = document.querySelector('.toc_title').nextElementSibling;
if(mokuziBotton) {
  mokuziBotton.addEventListener('click', () => {
    mokuziContent.classList.toggle('closed');
    mokuziBotton.textContent = "Close";
    if(mokuziContent.classList.contains("closed")) {
      mokuziBotton.textContent = "Open";
    }
  })
}
// 目次へ戻るボタンの設定
const mokuziBackButton = document.getElementById('back_to_mokuzi');
if (mokuziContent && mokuziBackButton) {
  document.addEventListener('scroll', ()=> {
    contentDistans =
      mokuziContent.getBoundingClientRect().bottom -
      mokuziContent.clientHeight * 0.2;
    if(contentDistans < 0) {
      mokuziBackButton.classList.add('show');
    } else {
      mokuziBackButton.classList.remove('show');
    }
  })
}
  // if (mokuziBackButton) {
  //   mokuziBackButton.addEventListener("click", () => {});
  // }
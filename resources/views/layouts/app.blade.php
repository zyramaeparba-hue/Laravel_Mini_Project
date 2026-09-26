<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Task Manifest</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@500;600&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --blue-deep:#122840; --blue-panel:#1b3652; --blue-panel-2:#20405f;
    --blue-line:#365d80; --blue-line-soft:rgba(255,255,255,0.08);
    --ink:#eaf3fb; --ink-dim:#9fb8cf;
    --amber:#e0a94e; --green:#6fae82; --rose:#d97a6a;
    box-sizing:border-box; padding-top:env(safe-area-inset-top,0px); padding-bottom:env(safe-area-inset-bottom,0px);
  }
  *{box-sizing:border-box;}
  html{scroll-padding-top:env(safe-area-inset-top,0px);}
  body{
    margin:0; min-height:100vh; color:var(--ink); background:var(--blue-deep);
    font-family:'IBM Plex Sans',sans-serif;
    background-image:
      linear-gradient(rgba(255,255,255,0.045) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,255,255,0.045) 1px, transparent 1px);
    background-size:28px 28px;
  }
  .mono{ font-family:'IBM Plex Mono', monospace; }

  header{
    padding:1.2rem 1.5rem; padding-top:calc(1.2rem + env(safe-area-inset-top,0px));
    display:flex; align-items:center; gap:1rem; flex-wrap:wrap;
    border-bottom:1px solid var(--blue-line); position:sticky; top:0; background:var(--blue-deep); z-index:10;
  }
  .brand{ display:flex; flex-direction:column; margin-right:.4rem; }
  .brand .title{ font-size:1.3rem; font-weight:600; margin:0; letter-spacing:.3px; }
  .brand .sub{ font-size:.7rem; color:var(--ink-dim); }

  .search-wrap{ position:relative; flex:1; min-width:160px; max-width:320px; }
  .search-wrap input{
    width:100%; padding:.55rem .8rem .55rem 2rem; border-radius:2px; border:1px solid var(--blue-line);
    background:var(--blue-panel); color:var(--ink); font-family:inherit; font-size:.85rem; outline:none;
  }
  .search-wrap input::placeholder{ color:var(--ink-dim); }
  .search-wrap input:focus{ border-color:var(--amber); }
  .search-wrap .ic{ position:absolute; left:.7rem; top:50%; transform:translateY(-50%); color:var(--ink-dim); font-size:.8rem; }

  select#priorityFilter{
    padding:.55rem .7rem; border-radius:2px; border:1px solid var(--blue-line); background:var(--blue-panel);
    color:var(--ink); font-family:inherit; font-size:.8rem;
  }
  .newbtn{
    margin-left:auto; background:var(--amber); color:#25190a; border:none; padding:.55rem 1.05rem;
    border-radius:2px; font-family:'IBM Plex Mono',monospace; font-size:.8rem; font-weight:600; cursor:pointer;
  }
  .newbtn:hover{ background:#eec06a; }

  .flash{ margin:1rem 1.5rem 0; padding:.65rem 1rem; border-radius:2px; font-size:.85rem; border:1px solid var(--blue-line);
    background:var(--blue-panel); display:flex; gap:.6rem; align-items:center; }
  .flash.hidden{ display:none; }
  .flash.ok{ border-color:var(--green); color:var(--green); }
  .flash.err{ border-color:var(--rose); color:var(--rose); }

  .content{ max-width:820px; margin:0 auto; padding:1.4rem 1.5rem 3rem; }

  .strip{ display:flex; gap:1.2rem; margin-bottom:1.3rem; flex-wrap:wrap; }
  .tally{ font-family:'IBM Plex Mono',monospace; font-size:.78rem; color:var(--ink-dim); }
  .tally b{ color:var(--ink); font-size:1rem; margin-right:.3rem; }

  .section-label{
    display:flex; align-items:center; gap:.6rem; margin:1.6rem 0 .7rem; font-family:'IBM Plex Mono',monospace;
    font-size:.78rem; color:var(--ink-dim);
  }
  .section-label::after{ content:''; flex:1; height:1px; background:var(--blue-line); }
  .section-label .dot{ width:7px; height:7px; border-radius:50%; }
  .section-label.pending .dot{ background:var(--amber); }
  .section-label.completed .dot{ background:var(--green); }

  .list{ display:flex; flex-direction:column; }
  .empty{ padding:1.4rem 0; color:var(--ink-dim); font-size:.85rem; }

  .item{
    display:flex; align-items:flex-start; gap:.8rem; padding:.85rem 0;
    border-bottom:1px solid var(--blue-line-soft);
  }
  .check{
    width:19px; height:19px; border-radius:2px; border:1.5px solid var(--blue-line); flex-shrink:0; margin-top:.15rem;
    cursor:pointer; background:none; padding:0; display:flex; align-items:center; justify-content:center; font-size:.65rem; color:#fff;
  }
  .check.done{ background:var(--green); border-color:var(--green); }

  .item-main{ flex:1; min-width:0; }
  .item-top{ display:flex; align-items:baseline; gap:.6rem; flex-wrap:wrap; }
  .item-title{ font-weight:600; font-size:.95rem; }
  .item-title.done{ text-decoration:line-through; color:var(--ink-dim); }
  .tag{ font-family:'IBM Plex Mono',monospace; font-size:.68rem; padding:.1rem .4rem; border-radius:2px; border:1px solid; }
  .tag.High{ color:var(--rose); border-color:var(--rose); }
  .tag.Medium{ color:var(--amber); border-color:var(--amber); }
  .tag.Low{ color:var(--green); border-color:var(--green); }
  .item-desc{ font-size:.8rem; color:var(--ink-dim); margin:.35rem 0 0; }
  .item-meta{ display:flex; align-items:center; gap:.7rem; margin-top:.5rem; font-size:.74rem; color:var(--ink-dim); }
  .item-meta .due{ font-family:'IBM Plex Mono',monospace; }
  .item-actions{ display:flex; gap:.3rem; margin-left:auto; }
  .item-actions button{ background:none; border:none; color:var(--ink-dim); cursor:pointer; font-size:.75rem; padding:.1rem .3rem; }
  .item-actions button:hover{ color:var(--amber); }

  .overlay{ position:fixed; inset:0; background:rgba(10,20,32,0.65); display:flex; align-items:center; justify-content:center;
    padding:1rem; z-index:50; opacity:0; transition:opacity .18s ease; }
  .overlay.hidden{ display:none; }
  .sheet{ background:var(--blue-panel); width:100%; max-width:440px; border-radius:3px; border:1px solid var(--blue-line);
    transform:scale(.97); transition:transform .18s ease; box-shadow:0 20px 50px rgba(0,0,0,0.4); }
  .sheet-head{ display:flex; justify-content:space-between; align-items:center; padding:1.1rem 1.3rem; border-bottom:1px solid var(--blue-line); }
  .sheet-head h3{ margin:0; font-size:1rem; font-weight:600; font-family:'IBM Plex Mono',monospace; }
  .xbtn{ background:none; border:none; color:var(--ink-dim); font-size:1.1rem; cursor:pointer; }
  form{ padding:1.15rem 1.3rem; display:flex; flex-direction:column; gap:.85rem; }
  label{ font-size:.72rem; color:var(--ink-dim); display:block; margin-bottom:.3rem; font-family:'IBM Plex Mono',monospace; }
  input[type=text], textarea, input[type=date], select#taskPriority{
    width:100%; padding:.58rem .78rem; border:1px solid var(--blue-line); border-radius:2px;
    background:var(--blue-deep); font-family:'IBM Plex Sans',sans-serif; font-size:.86rem; color:var(--ink); outline:none;
  }
  textarea{ resize:vertical; min-height:68px; }
  input:focus, textarea:focus, select:focus{ border-color:var(--amber); }
  .row2{ display:grid; grid-template-columns:1fr 1fr; gap:.75rem; }
  .sheet-foot{ display:flex; justify-content:flex-end; gap:.6rem; padding-top:.3rem; border-top:1px solid var(--blue-line); }
  .btn-ghost{ background:none; border:none; color:var(--ink-dim); padding:.55rem .9rem; font-family:inherit; font-size:.85rem; cursor:pointer; }
  .btn-solid{ background:var(--amber); color:#25190a; border:none; padding:.55rem 1.1rem; border-radius:2px; font-family:'IBM Plex Mono',monospace; font-weight:600; font-size:.82rem; cursor:pointer; }
</style>
</head>
<body>

<header>
  <div class="brand"><h1 class="title mono">TASK MANIFEST</h1><div class="sub mono">WST21-PM-2026-SF</div></div>
  <div class="search-wrap"><span class="ic">⌕</span><input type="text" id="searchInput" oninput="handleSearch()" placeholder="search entries"></div>
  <select id="priorityFilter" onchange="applyFilters()">
    <option value="all">all priorities</option>
    <option value="High">high</option>
    <option value="Medium">medium</option>
    <option value="Low">low</option>
  </select>
  <button class="newbtn" onclick="openCreateModal()">+ NEW ENTRY</button>
</header>

<div id="flashMessage" class="flash hidden"><span id="flashIcon"></span><span id="flashText"></span></div>

<div class="content">
  <div class="strip">
    <div class="tally"><b id="statTotal">0</b>total</div>
    <div class="tally"><b id="statPending">0</b>pending</div>
    <div class="tally"><b id="statCompleted">0</b>completed</div>
  </div>

  <div class="section-label pending"><span class="dot"></span>PENDING</div>
  <div class="list" id="listPending"></div>
  <div class="empty hidden" id="emptyPending">Nothing pending. Add an entry above.</div>

  <div class="section-label completed"><span class="dot"></span>COMPLETED</div>
  <div class="list" id="listCompleted"></div>
  <div class="empty hidden" id="emptyCompleted">Nothing completed yet.</div>
</div>

<div id="taskModal" class="overlay hidden">
  <div class="sheet" id="modalCard">
    <div class="sheet-head"><h3 id="modalTitle">NEW ENTRY</h3><button class="xbtn" onclick="closeModal()">✕</button></div>
    <form id="taskForm" onsubmit="handleFormSubmit(event)">
      <input type="hidden" id="taskId">
      <div><label>title</label><input type="text" id="taskTitle" required placeholder="What needs doing?"></div>
      <div><label>notes</label><textarea id="taskDesc" placeholder="Details, steps, or context"></textarea></div>
      <div class="row2">
        <div><label>priority</label>
          <select id="taskPriority"><option value="Low">Low</option><option value="Medium" selected>Medium</option><option value="High">High</option></select>
        </div>
        <div><label>due date</label><input type="date" id="taskDueDate" required></div>
      </div>
      <div class="sheet-foot">
        <button type="button" class="btn-ghost" onclick="closeModal()">cancel</button>
        <button type="submit" class="btn-solid">save entry</button>
      </div>
    </form>
  </div>
</div>

<script>
let tasks = [];
let currentSearchQuery = '';

window.onload = function(){
  document.getElementById('taskDueDate').min = new Date().toISOString().split('T')[0];
  renderApp();
};

function renderApp(){ renderList(); }

function getFiltered(){
  const p = document.getElementById('priorityFilter').value;
  return tasks.filter(t=>{
    if(p!=='all' && t.priority!==p) return false;
    if(currentSearchQuery && !t.title.toLowerCase().includes(currentSearchQuery) && !t.description.toLowerCase().includes(currentSearchQuery)) return false;
    return true;
  });
}
function handleSearch(){
  currentSearchQuery = document.getElementById('searchInput').value.toLowerCase().trim();
  renderList();
}
function applyFilters(){ renderList(); }

function renderList(){
  const filtered = getFiltered();
  const pending = filtered.filter(t=>t.status==='pending').sort((a,b)=> a.dueDate.localeCompare(b.dueDate));
  const completed = filtered.filter(t=>t.status==='completed').sort((a,b)=> a.dueDate.localeCompare(b.dueDate));

  document.getElementById('statTotal').innerText = tasks.length;
  document.getElementById('statPending').innerText = tasks.filter(t=>t.status==='pending').length;
  document.getElementById('statCompleted').innerText = tasks.filter(t=>t.status==='completed').length;

  fillList('listPending', 'emptyPending', pending);
  fillList('listCompleted', 'emptyCompleted', completed);
}

function fillList(listId, emptyId, items){
  const list = document.getElementById(listId);
  const empty = document.getElementById(emptyId);
  list.innerHTML = '';
  if(items.length===0){ empty.classList.remove('hidden'); return; }
  empty.classList.add('hidden');
  items.forEach(task=>{
    const done = task.status==='completed';
    const row = document.createElement('div');
    row.className = 'item';
    row.innerHTML = `
      <button class="check ${done?'done':''}" onclick="toggleTaskStatus('${task.id}')" title="${done?'Mark pending':'Mark complete'}">${done?'✓':''}</button>
      <div class="item-main">
        <div class="item-top">
          <span class="item-title ${done?'done':''}">${escapeHtml(task.title)}</span>
          <span class="tag ${task.priority}">${task.priority.toUpperCase()}</span>
        </div>
        <p class="item-desc">${escapeHtml(task.description || 'No notes added.')}</p>
        <div class="item-meta">
          <span class="due">DUE ${task.dueDate}</span>
          <span class="item-actions">
            <button onclick="openEditModal('${task.id}')">edit</button>
            <button onclick="deleteTask('${task.id}')">delete</button>
          </span>
        </div>
      </div>
    `;
    list.appendChild(row);
  });
}

function openModal(){
  const modal = document.getElementById('taskModal');
  const card = document.getElementById('modalCard');
  modal.classList.remove('hidden');
  requestAnimationFrame(()=>{ modal.style.opacity='1'; card.style.transform='scale(1)'; });
}
function openCreateModal(){
  document.getElementById('taskId').value='';
  document.getElementById('taskForm').reset();
  document.getElementById('modalTitle').innerText = 'NEW ENTRY';
  openModal();
}
function openEditModal(id){
  const task = tasks.find(t=>t.id===id);
  if(!task) return;
  document.getElementById('taskId').value = task.id;
  document.getElementById('taskTitle').value = task.title;
  document.getElementById('taskDesc').value = task.description;
  document.getElementById('taskPriority').value = task.priority;
  document.getElementById('taskDueDate').value = task.dueDate;
  document.getElementById('modalTitle').innerText = 'EDIT ENTRY';
  openModal();
}
function closeModal(){
  const modal = document.getElementById('taskModal');
  const card = document.getElementById('modalCard');
  modal.style.opacity='0'; card.style.transform='scale(.97)';
  setTimeout(()=>modal.classList.add('hidden'),180);
}
function handleFormSubmit(e){
  e.preventDefault();
  const id = document.getElementById('taskId').value;
  const title = document.getElementById('taskTitle').value.trim();
  const description = document.getElementById('taskDesc').value.trim();
  const priority = document.getElementById('taskPriority').value;
  const dueDate = document.getElementById('taskDueDate').value;
  if(!title || !dueDate) return;
  if(id){
    tasks = tasks.map(t=>t.id===id?{...t,title,description,priority,dueDate}:t);
    showFlash('Entry updated.', 'ok');
  } else {
    tasks.unshift({id:Date.now().toString(), title, description, priority, dueDate, status:'pending'});
    showFlash('Entry added.', 'ok');
  }
  closeModal();
  renderApp();
}
function toggleTaskStatus(id){
  tasks = tasks.map(t=>{
    if(t.id===id){
      const s = t.status==='completed' ? 'pending' : 'completed';
      showFlash(s==='completed' ? 'Entry completed.' : 'Entry reopened.', 'ok');
      return {...t, status:s};
    }
    return t;
  });
  renderApp();
}
function deleteTask(id){
  if(confirm('Delete this entry?')){
    tasks = tasks.filter(t=>t.id!==id);
    showFlash('Entry deleted.', 'err');
    renderApp();
  }
}
function showFlash(message, type){
  const flash = document.getElementById('flashMessage');
  const text = document.getElementById('flashText');
  text.innerText = message;
  flash.className = 'flash ' + type;
  document.getElementById('flashIcon').innerText = type==='ok' ? '✓' : '✕';
  setTimeout(()=>flash.classList.add('hidden'), 3200);
}
function escapeHtml(str){
  return str.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#039;");
}
</script>
</body>
</html>
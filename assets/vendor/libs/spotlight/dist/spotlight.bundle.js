/**
 * Spotlight.js v0.7.8 (Bundle)
 * Copyright 2019-2021 Nextapps GmbH
 * Author: Thomas Wilkerling
 * Licence: Apache-2.0
 * https://github.com/nextapps-de/spotlight
 */
(function(){'use strict';var aa=document.createElement("style");aa.innerHTML="@keyframes pulsate{0%,to{opacity:1}50%{opacity:.2}}#spotlight{position:fixed;top:-1px;bottom:-1px;width:100%;z-index:99999;color:#fff;background-color:#000000d6;opacity:0;overflow:hidden;-webkit-user-select:none;-ms-user-select:none;user-select:none;transition:opacity .2s ease-out;font-family:Arial,sans-serif;font-size:16px;font-weight:400;contain:strict;touch-action:none;pointer-events:none}#spotlight.show{opacity:1;transition:none;pointer-events:auto}#spotlight.white{color:#212529;background-color:#fff}#spotlight.white .spl-next,#spotlight.white .spl-page~*,#spotlight.white .spl-prev,#spotlight.white .spl-spinner{filter:invert(1)}#spotlight.white .spl-progress{background-color:rgba(0,0,0,.35)}#spotlight.white .spl-footer,#spotlight.white .spl-header{background-color:rgba(255,255,255,.65)}#spotlight.white .spl-button{background:#212529;color:#fff}.spl-footer,.spl-header{background-color:rgba(0,0,0,.45)}#spotlight .contain,#spotlight .cover{object-fit:cover;height:100%;width:100%}#spotlight .contain{object-fit:contain}#spotlight .autofit{object-fit:none;width:auto;height:auto;max-height:none;max-width:none;transition:none}.spl-scene,.spl-spinner,.spl-track{width:100%;height:100%;position:absolute}.spl-track{contain:strict}.spl-spinner{background-position:center;background-repeat:no-repeat;background-size:42px;opacity:0}.spl-spinner.spin{background-image:url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzgiIGhlaWdodD0iMzgiIHZpZXdCb3g9IjAgMCAzOCAzOCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHJva2U9IiNmZmYiPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMSAxKSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2Utb3BhY2l0eT0iLjY1Ij48Y2lyY2xlIHN0cm9rZS1vcGFjaXR5PSIuMTUiIGN4PSIxOCIgY3k9IjE4IiByPSIxOCIvPjxwYXRoIGQ9Ik0zNiAxOGMwLTkuOTQtOC4wNi0xOC0xOC0xOCI+PGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIGZyb209IjAgMTggMTgiIHRvPSIzNjAgMTggMTgiIGR1cj0iMXMiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIi8+PC9wYXRoPjwvZz48L2c+PC9zdmc+);transition:opacity .2s linear .25s;opacity:1}.spl-spinner.error{background-image:url(data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjMyIiB3aWR0aD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMTYsMUExNSwxNSwwLDEsMCwzMSwxNiwxNSwxNSwwLDAsMCwxNiwxWm0wLDJhMTMsMTMsMCwwLDEsOC40NSwzLjE0TDYuMTQsMjQuNDVBMTMsMTMsMCwwLDEsMTYsM1ptMCwyNmExMywxMywwLDAsMS04LjQ1LTMuMTRMMjUuODYsNy41NUExMywxMywwLDAsMSwxNiwyOVoiIGlkPSJiYW5fc2lnbl9jcm9zc2VkX2NpcmNsZSIvPjwvc3ZnPg==);background-size:128px;transition:none;opacity:.5}.spl-scene{transition:transform .65s cubic-bezier(.1,1,.1,1);contain:layout size;will-change:transform}.spl-pane>*{position:absolute;width:auto;height:auto;max-width:100%;max-height:100%;left:50%;top:50%;margin:0;padding:0;border:0;transform:translate(-50%,-50%) scale(1);transition:transform .65s cubic-bezier(.3,1,.3,1),opacity .65s ease;contain:layout style;will-change:transform,opacity;visibility:hidden}.spl-header,.spl-pane,.spl-progress{position:absolute;top:0}.spl-pane{width:100%;height:100%;transition:transform .65s cubic-bezier(.3,1,.3,1);contain:layout size;will-change:transform,contents}.spl-header{width:100%;height:50px;text-align:right;transform:translateY(-100px);transition:transform .35s ease;overflow:hidden;will-change:transform}#spotlight.menu .spl-footer,#spotlight.menu .spl-header,.spl-footer:hover,.spl-header:hover{transform:translateY(0)}.spl-header div{display:inline-block;vertical-align:middle;white-space:nowrap;width:50px;height:50px;opacity:.5}.spl-progress{width:100%;height:3px;background-color:rgba(255,255,255,.45);transform:translateX(-100%);transition:transform linear}.spl-footer,.spl-next,.spl-prev{position:absolute;transition:transform .35s ease;will-change:transform}.spl-footer{left:0;right:0;bottom:0;line-height:20px;padding:20px 20px 0;padding-bottom:env(safe-area-inset-bottom,0);text-align:left;font-size:15px;font-weight:400;transform:translateY(100%)}.spl-title{font-size:22px}.spl-button,.spl-description,.spl-title{margin-bottom:20px}.spl-button{display:inline-block;background:#fff;color:#000;border-radius:5px;padding:10px 20px;cursor:pointer}.spl-next,.spl-page~*,.spl-prev{background-position:center;background-repeat:no-repeat}.spl-page{float:left;width:auto;line-height:50px}.spl-page~*{background-size:21px;float:right}.spl-fullscreen{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjI0IiBzdHJva2U9IiNmZmYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyLjUiIHZpZXdCb3g9Ii0xIC0xIDI2IDI2IiB3aWR0aD0iMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTggM0g1YTIgMiAwIDAgMC0yIDJ2M20xOCAwVjVhMiAyIDAgMCAwLTItMmgtM20wIDE4aDNhMiAyIDAgMCAwIDItMnYtM00zIDE2djNhMiAyIDAgMCAwIDIgMmgzIi8+PC9zdmc+)}.spl-fullscreen.on{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjI0IiBzdHJva2U9IiNmZmYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyLjUiIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjI0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik04IDN2M2EyIDIgMCAwIDEtMiAySDNtMTggMGgtM2EyIDIgMCAwIDEtMi0yVjNtMCAxOHYtM2EyIDIgMCAwIDEgMi0yaDNNMyAxNmgzYTIgMiAwIDAgMSAyIDJ2MyIvPjwvc3ZnPg==)}.spl-autofit{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBoZWlnaHQ9Ijk2cHgiIHZpZXdCb3g9IjAgMCA5NiA5NiIgd2lkdGg9Ijk2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggdHJhbnNmb3JtPSJyb3RhdGUoOTAgNTAgNTApIiBmaWxsPSIjZmZmIiBkPSJNNzEuMzExLDgwQzY5LjY3LDg0LjY2LDY1LjIzLDg4LDYwLDg4SDIwYy02LjYzLDAtMTItNS4zNy0xMi0xMlYzNmMwLTUuMjMsMy4zNC05LjY3LDgtMTEuMzExVjc2YzAsMi4yMSwxLjc5LDQsNCw0SDcxLjMxMSAgeiIvPjxwYXRoIHRyYW5zZm9ybT0icm90YXRlKDkwIDUwIDUwKSIgZmlsbD0iI2ZmZiIgZD0iTTc2LDhIMzZjLTYuNjMsMC0xMiw1LjM3LTEyLDEydjQwYzAsNi42Myw1LjM3LDEyLDEyLDEyaDQwYzYuNjMsMCwxMi01LjM3LDEyLTEyVjIwQzg4LDEzLjM3LDgyLjYzLDgsNzYsOHogTTgwLDYwICBjMCwyLjIxLTEuNzksNC00LDRIMzZjLTIuMjEsMC00LTEuNzktNC00VjIwYzAtMi4yMSwxLjc5LTQsNC00aDQwYzIuMjEsMCw0LDEuNzksNCw0VjYweiIvPjwvc3ZnPg==)}.spl-zoom-in,.spl-zoom-out{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjI0IiBzdHJva2U9IiNmZmYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIiB2aWV3Qm94PSIwIDAgMjQgMjQiIHdpZHRoPSIyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSIxMSIgY3k9IjExIiByPSI4Ii8+PGxpbmUgeDE9IjIxIiB4Mj0iMTYuNjUiIHkxPSIyMSIgeTI9IjE2LjY1Ii8+PGxpbmUgeDE9IjgiIHgyPSIxNCIgeTE9IjExIiB5Mj0iMTEiLz48L3N2Zz4=);background-size:22px}.spl-zoom-in{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjI0IiBzdHJva2U9IiNmZmYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIiB2aWV3Qm94PSIwIDAgMjQgMjQiIHdpZHRoPSIyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSIxMSIgY3k9IjExIiByPSI4Ii8+PGxpbmUgeDE9IjIxIiB4Mj0iMTYuNjUiIHkxPSIyMSIgeTI9IjE2LjY1Ii8+PGxpbmUgeDE9IjExIiB4Mj0iMTEiIHkxPSI4IiB5Mj0iMTQiLz48bGluZSB4MT0iOCIgeDI9IjE0IiB5MT0iMTEiIHkyPSIxMSIvPjwvc3ZnPg==)}.spl-download{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNDEuNzMycHgiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDE0MS43MzIgMTQxLjczMiIgd2lkdGg9IjE0MS43MzJweCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSIjZmZmIj48cGF0aCBkPSJNMTIwLjY3NCwxMjUuMTM4SDIwLjc5M3YxNi41OTRoOTkuODgxVjEyNS4xMzh6IE0xMTkuMDE5LDU4Ljc3NmMtMi41NjEtMi41NjItNi43MTYtMi41NjItOS4yNzUsMEw3Ny4yMSw5MS4zMTJWNi41NjIgICBDNzcuMjEsMi45MzYsNzQuMjY5LDAsNzAuNjQ4LDBjLTMuNjI0LDAtNi41NiwyLjkzNy02LjU2LDYuNTYzdjg0Ljc1TDMxLjk5Miw1OS4yMThjLTIuNTYyLTIuNTY0LTYuNzE1LTIuNTY0LTkuMjc3LDAgICBjLTIuNTY1LDIuNTYyLTIuNTY1LDYuNzE2LDAsOS4yNzlsNDMuMjk0LDQzLjI5M2MwLjE1LDAuMTU0LDAuMzE0LDAuMjk5LDAuNDgxLDAuNDM4YzAuMDc2LDAuMDYyLDAuMTU1LDAuMTEzLDAuMjM0LDAuMTc2ICAgYzAuMDk0LDAuMDY1LDAuMTg2LDAuMTQyLDAuMjc5LDAuMjA2YzAuMDk3LDAuMDYzLDAuMTkyLDAuMTE0LDAuMjg2LDAuMTc0YzAuMDg4LDAuMDU0LDAuMTc0LDAuMTA1LDAuMjY1LDAuMTUzICAgYzAuMSwwLjA1NiwwLjE5OSwwLjEsMC4yOTgsMC4xNDdjMC4wOTcsMC4wNDUsMC4xOSwwLjA5MSwwLjI4MywwLjEzMmMwLjA5OCwwLjA0LDAuMTk2LDAuMDcyLDAuMjk1LDAuMTA1ICAgYzAuMTA0LDAuMDM4LDAuMjA3LDAuMDc4LDAuMzEyLDAuMTA5YzAuMTAxLDAuMDMsMC4xOTcsMC4wNTIsMC4yOTcsMC4wNzdjMC4xMDgsMC4wMjMsMC4yMTQsMC4wNTgsMC4zMjQsMC4wNzggICBjMC4xMTUsMC4wMjEsMC4yMzEsMC4wMzMsMC4zNDYsMC4wNTRjMC4wOTcsMC4wMTUsMC4xOTIsMC4wMzIsMC4yODksMC4wNDJjMC40MywwLjA0MiwwLjg2NSwwLjA0MiwxLjI5NSwwICAgYzAuMS0wLjAxLDAuMTkxLTAuMDI3LDAuMjg5LTAuMDQyYzAuMTE0LTAuMDIxLDAuMjMzLTAuMDI5LDAuMzQ0LTAuMDU0YzAuMTA5LTAuMDIxLDAuMjE3LTAuMDU1LDAuMzI0LTAuMDc4ICAgYzAuMTAyLTAuMDI1LDAuMTk5LTAuMDQ3LDAuMjk5LTAuMDc3YzAuMTA1LTAuMDMxLDAuMjA3LTAuMDcxLDAuMzEyLTAuMTA5YzAuMTAyLTAuMDMsMC4xOTUtMC4wNjIsMC4yOTUtMC4xMDUgICBjMC4wOTYtMC4wNDEsMC4xOTEtMC4wODcsMC4yODMtMC4xMzJjMC4xLTAuMDQ4LDAuMTk5LTAuMDkyLDAuMjk3LTAuMTQ3YzAuMDkxLTAuMDQ4LDAuMTc3LTAuMTA0LDAuMjY0LTAuMTUzICAgYzAuMDk4LTAuMDYsMC4xOTMtMC4xMSwwLjI4Ny0wLjE3NGMwLjA5Ni0wLjA2NCwwLjE4OS0wLjE0MSwwLjI4MS0wLjIwNmMwLjA3Ni0wLjA2MiwwLjE1Ni0wLjExMywwLjIzMy0wLjE3NiAgIGMwLjI0OS0wLjIwNCwwLjQ3OS0wLjQzNywwLjY5NC0wLjY3YzAuMDc2LTAuMDY3LDAuMTU0LTAuMTMxLDAuMjI5LTAuMjAzbDQzLjI5NC00My4yOTYgICBDMTIxLjU4MSw2NS40OTEsMTIxLjU4MSw2MS4zMzcsMTE5LjAxOSw1OC43NzYiLz48L2c+PC9zdmc+);background-size:20px}.spl-theme{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBoZWlnaHQ9IjI0cHgiIHZlcnNpb249IjEuMiIgdmlld0JveD0iMiAyIDIwIDIwIiB3aWR0aD0iMjRweCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSIjZmZmIj48cGF0aCBkPSJNMTIsNGMtNC40MTgsMC04LDMuNTgyLTgsOHMzLjU4Miw4LDgsOHM4LTMuNTgyLDgtOFMxNi40MTgsNCwxMiw0eiBNMTIsMThjLTMuMzE0LDAtNi0yLjY4Ni02LTZzMi42ODYtNiw2LTZzNiwyLjY4Niw2LDYgUzE1LjMxNCwxOCwxMiwxOHoiLz48cGF0aCBkPSJNMTIsN3YxMGMyLjc1NywwLDUtMi4yNDMsNS01UzE0Ljc1Nyw3LDEyLDd6Ii8+PC9nPjwvc3ZnPg==)}.spl-play{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjI0IiBzdHJva2U9IiNmZmYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIiB2aWV3Qm94PSItMC41IC0wLjUgMjUgMjUiIHdpZHRoPSIyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSIxMiIgY3k9IjEyIiByPSIxMCIvPjxwb2x5Z29uIGZpbGw9IiNmZmYiIHBvaW50cz0iMTAgOCAxNiAxMiAxMCAxNiAxMCA4Ii8+PC9zdmc+)}.spl-play.on{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjI0IiBzdHJva2U9IiNmZmYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIiB2aWV3Qm94PSItMC41IC0wLjUgMjUgMjUiIHdpZHRoPSIyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSIxMiIgY3k9IjEyIiByPSIxMCIvPjxsaW5lIHgxPSIxMCIgeDI9IjEwIiB5MT0iMTUiIHkyPSI5Ii8+PGxpbmUgeDE9IjE0IiB4Mj0iMTQiIHkxPSIxNSIgeTI9IjkiLz48L3N2Zz4=);animation:pulsate 1s ease infinite}.spl-close{background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjI0IiBzdHJva2U9IiNmZmYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIiB2aWV3Qm94PSIyIDIgMjAgMjAiIHdpZHRoPSIyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48bGluZSB4MT0iMTgiIHgyPSI2IiB5MT0iNiIgeTI9IjE4Ii8+PGxpbmUgeDE9IjYiIHgyPSIxOCIgeTE9IjYiIHkyPSIxOCIvPjwvc3ZnPg==)}.spl-next,.spl-prev{top:50%;width:50px;height:50px;opacity:.65;background-color:rgba(0,0,0,.45);border-radius:100%;cursor:pointer;margin-top:-25px;transform:translateX(-100px);background-image:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjI0IiBzdHJva2U9IiNmZmYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIiB2aWV3Qm94PSIwIDAgMjQgMjQiIHdpZHRoPSIyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cG9seWxpbmUgcG9pbnRzPSIxNSAxOCA5IDEyIDE1IDYiLz48L3N2Zz4=);background-size:30px}.spl-prev{left:20px}.spl-next{left:auto;right:20px;transform:translateX(100px) scaleX(-1)}#spotlight.menu .spl-prev{transform:translateX(0)}#spotlight.menu .spl-next{transform:translateX(0) scaleX(-1)}@media (hover:hover){.spl-page~div{cursor:pointer;transition:opacity .2s ease}.spl-next:hover,.spl-page~div:hover,.spl-prev:hover{opacity:1}}@media (max-width:500px){.spl-header div{width:44px}.spl-footer .spl-title{font-size:20px}.spl-footer{font-size:14px}.spl-next,.spl-prev{width:35px;height:35px;margin-top:-17.5px;background-size:15px 15px}.spl-spinner{background-size:30px 30px}}.hide-scrollbars{overflow:hidden!important}";
var ba=document.getElementsByTagName("head")[0];ba.firstChild?ba.insertBefore(aa,ba.firstChild):ba.appendChild(aa);Object.assign||(Object.assign=function(a,b){for(var c=Object.keys(b),e=0,f;e<c.length;e++)f=c[e],a[f]=b[f];return a});Element.prototype.closest||(Element.prototype.closest=function(a){a=a.substring(1);for(var b=this;b&&1===b.nodeType;){if(b.classList.contains(a))return b;b=b.parentElement}return null});function d(a,b,c){a.classList[c?"add":"remove"](b)}function g(a,b,c){c=""+c;a["_s_"+b]!==c&&(a.style.setProperty(b,c),a["_s_"+b]=c)}var ca=0;function da(a,b){b&&(g(a,"transition","none"),b());ca||(ca=a.clientTop&&0);b&&g(a,"transition","")}function h(a,b,c,e){k(!0,a,b,c,e)}function k(a,b,c,e,f){b[(a?"add":"remove")+"EventListener"](c,e,f||!1===f?f:!0)}function ea(a,b){a.stopPropagation();b&&a.preventDefault()}function l(a,b){g(a,"display",b?"":"none")}
function fa(a,b){g(a,"visibility",b?"":"hidden")}function m(a,b){g(a,"transition",b?"":"none")};var n="theme download play page close autofit zoom-in zoom-out prev next fullscreen".split(" "),ha={page:1,close:1,autofit:1,"zoom-in":1,"zoom-out":1,prev:1,next:1,fullscreen:1};var p=document.createElement("div");p.id="spotlight";p.innerHTML="<div class=spl-spinner></div><div class=spl-track><div class=spl-scene><div class=spl-pane></div></div></div><div class=spl-header><div class=spl-page> </div></div><div class=spl-progress></div><div class=spl-footer><div class=spl-title> </div><div class=spl-description> </div><div class=spl-button> </div></div><div class=spl-prev></div><div class=spl-next></div>";var ia={},ja=document.createElement("video");function ka(a,b,c,e){if("node"!==e)for(var f=Object.keys(c),A=0,w;A<f.length;A++)if(w=f[A],3<w.length&&0===w.indexOf("src"))if("video"===e){var F=ia[w];if(F){if(0<F){var Ga=c[w];break}}else if(ja.canPlayType("video/"+w.substring(3).replace("-","").toLowerCase())){ia[w]=1;Ga=c[w];break}else ia[w]=-1}else if(F=parseInt(w.substring(4),10))if(F=Math.abs(b-F),!jb||F<jb){var jb=F;Ga=c[w]}return Ga||c.src||c.href||a.src||a.href};var q={},la=navigator.connection,ma=window.devicePixelRatio||1,r,t,na,oa,u,pa,qa,ra,v,sa,ta,ua,x,y,z,B,C,D,va,E,G,wa,xa,ya,za,Aa,Ba,H,Ca,Da,Ea,Fa,I,Ha,Ia,Ja,Ka,J,K,L,M,N,La=document.createElement("img"),Ma,Na,Oa,Pa,Qa,Ra,Sa,Ta,Ua,Va,Wa,O,Xa,P,Q,R,S,Ya,T,Za;h(document,"click",$a);
function ab(){function a(c){return q[c]=(p||document).getElementsByClassName("spl-"+c)[0]}if(!K){K=document.body;Ma=a("scene");Na=a("header");Oa=a("footer");Pa=a("title");Qa=a("description");Ra=a("button");Sa=a("prev");Ta=a("next");Va=a("page");O=a("progress");Xa=a("spinner");M=[a("pane")];U("close",bb);K[T="requestFullscreen"]||K[T="msRequestFullscreen"]||K[T="webkitRequestFullscreen"]||K[T="mozRequestFullscreen"]||(T="");T?(Za=T.replace("request","exit").replace("mozRequest","mozCancel").replace("Request",
"Exit"),Ua=U("fullscreen",cb)):n.pop();U("autofit",V);U("zoom-in",db);U("zoom-out",eb);U("theme",fb);Wa=U("play",W);U("download",gb);h(Sa,"click",hb);h(Ta,"click",ib);var b=a("track");h(b,"mousedown",kb);h(b,"mousemove",lb);h(b,"mouseleave",mb);h(b,"mouseup",mb);h(b,"touchstart",kb,{passive:!1});h(b,"touchmove",lb,{passive:!0});h(b,"touchend",mb);h(Ra,"click",function(){Fa?Fa(z,D):Ea&&(location.href=Ea)})}}
function U(a,b){var c=document.createElement("div");c.className="spl-"+a;h(c,"click",b);Na.appendChild(c);return q[a]=c}function $a(a){var b=a.target.closest(".spotlight");if(b){ea(a,!0);a=b.closest(".spotlight-group");C=(a||document).getElementsByClassName("spotlight");for(var c=0;c<C.length;c++)if(C[c]===b){E=a&&a.dataset;nb(c+1);break}}}
function nb(a){if(B=C.length){K||ab();xa&&xa(a);for(var b=M[0],c=b.parentNode,e=M.length;e<B;e++){var f=b.cloneNode(!1);g(f,"left",100*e+"%");c.appendChild(f);M[e]=f}L||(K.appendChild(p),ob());z=a||1;m(Ma);pb(!0);T&&l(Ua,0<screen.availHeight-window.innerHeight);history.pushState({spl:1},"");history.pushState({spl:2},"");m(p,!0);d(K,"hide-scrollbars",!0);d(p,"show",!0);qb(!0);ob();X();H&&W(!0,!0)}}function Y(a,b){a=D[a];return"undefined"!==typeof a?(a=""+a,"false"!==a&&(a||b)):b}
function rb(a){a?da(N,rb):(m(Ma,Ka),g(N,"opacity",Ja?0:1),sb(Ia&&.8),J&&d(N,J,!0))}
function tb(a){L=M[a-1];N=L.firstChild;z=a;if(N)x&&V(),Aa&&d(N,Aa,!0),rb(!0),J&&d(N,J),Ja&&g(N,"opacity",1),Ia&&g(N,"transform",""),g(N,"visibility","visible"),Q&&(La.src=Q),H&&ub(R);else{var b=P.media,c=Y("spinner",!0);if("video"===b)vb(c,!0),N=document.createElement("video"),N.onloadedmetadata=function(){N===this&&(N.onerror=null,N.width=N.videoWidth,N.height=N.videoHeight,wb(),vb(c),tb(a))},N.poster=D.poster,N.preload=Da?"auto":"metadata",N.controls=Y("controls",!0),N.autoplay=D.autoplay,N.h=Y("inline"),
N.muted=Y("muted"),N.src=P.src,L.appendChild(N);else{if("node"===b){N=P.src;"string"===typeof N&&(N=document.querySelector(N));N&&(N.g||(N.g=N.parentNode),wb(),L.appendChild(N),tb(a));return}vb(c,!0);N=document.createElement("img");N.onload=function(){N===this&&(N.onerror=null,vb(c),tb(a),wb())};N.src=P.src;L.appendChild(N)}N&&(c||g(N,"visibility","visible"),N.onerror=function(){N===this&&(xb(N),d(Xa,"error",!0),vb(c))})}}function vb(a,b){a&&d(Xa,"spin",b)}
function yb(){return document.fullscreen||document.fullscreenElement||document.webkitFullscreenElement||document.mozFullScreenElement}function zb(){ob();N&&wb();if(T){var a=yb();d(Ua,"on",a);a||l(Ua,0<screen.availHeight-window.innerHeight)}}function ob(){u=p.clientWidth;pa=p.clientHeight}function wb(){qa=N.clientWidth;ra=N.clientHeight}function sb(a){g(N,"transform","translate(-50%, -50%) scale("+(a||v)+")")}function Z(a,b){g(L,"transform",a||b?"translate("+a+"px, "+b+"px)":"")}
function Ab(a,b,c){b?da(Ma,function(){Ab(a,!1,c)}):g(Ma,"transform","translateX("+(100*-a+(c||0))+"%)")}function qb(a){k(a,window,"keydown",Bb);k(a,window,"wheel",Cb);k(a,window,"resize",zb);k(a,window,"popstate",Db)}function Db(a){L&&a.state.spl&&bb(!0)}function Bb(a){if(L){var b=!1!==D["zoom-in"];switch(a.keyCode){case 8:b&&V();break;case 27:bb();break;case 32:H&&W();break;case 37:hb();break;case 39:ib();break;case 38:case 107:case 187:b&&db();break;case 40:case 109:case 189:b&&eb()}}}
function Cb(a){L&&!1!==D["zoom-in"]&&(a=a.deltaY,0>.5*(0>a?1:a?-1:0)?eb():db())}function W(a,b){("boolean"===typeof a?a:!R)===!R&&(R=R?clearTimeout(R):1,d(Wa,"on",R),b||ub(R))}function ub(a){wa&&(da(O,function(){g(O,"transition-duration","");g(O,"transform","")}),a&&(g(O,"transition-duration",Ha+"s"),g(O,"transform","translateX(0)")));a&&(R=setTimeout(ib,1E3*Ha))}function X(){Ba&&(Ya=Date.now()+2950,S||(d(p,"menu",!0),Eb(3E3)))}
function Eb(a){S=setTimeout(function(){var b=Date.now();b>=Ya?(d(p,"menu"),S=0):Eb(Ya-b)},a)}function Fb(a){"boolean"===typeof a&&(S=a?S:0);S?(S=clearTimeout(S),d(p,"menu")):X()}function kb(a){ea(a,!0);sa=!0;ta=!1;var b=a.touches;b&&(b=b[0])&&(a=b);ua=qa*v<=u;na=a.pageX;oa=a.pageY;m(L)}function mb(a){ea(a);if(sa){if(ta){if(ua&&ta){var b=(a=r<-(u/7)&&(z<B||G))||r>u/7&&(1<z||G);if(a||b)Ab(z-1,!0,r/u*100),a&&ib()||b&&hb();r=0;Z()}m(L,!0)}else Fb();sa=!1}}
function lb(a){ea(a);if(sa){var b=a.touches;b&&(b=b[0])&&(a=b);b=(qa*v-u)/2;r-=na-(na=a.pageX);ua||(r>b?r=b:r<-b&&(r=-b),ra*v>pa&&(b=(ra*v-pa)/2,t-=oa-(oa=a.pageY),t>b?t=b:t<-b&&(t=-b)));ta=!0;Z(r,t)}else X()}function cb(a){var b=yb();if("boolean"!==typeof a||a!==!!b)if(b)document[Za]();else p[T]()}function fb(a){"string"!==typeof a&&(a=y?"":Ca||"white");y!==a&&(y&&d(p,y),a&&d(p,a,!0),y=a)}
function V(a){"boolean"===typeof a&&(x=!a);x=1===v&&!x;d(N,"autofit",x);g(N,"transform","");v=1;t=r=0;wb();m(L);Z()}function db(){var a=v/.65;50>=a&&(x&&V(),r/=.65,t/=.65,Z(r,t),Gb(a))}function eb(){var a=.65*v;x&&V();1<=a&&(1===a?r=t=0:(r*=.65,t*=.65),Z(r,t),Gb(a))}function Gb(a){v=a||1;sb()}function gb(){var a=K,b=document.createElement("a"),c=N.src;b.href=c;b.download=c.substring(c.lastIndexOf("/")+1);a.appendChild(b);b.click();a.removeChild(b)}
function bb(a){setTimeout(function(){K.removeChild(p);L=N=P=D=E=C=xa=ya=za=Fa=null},200);d(K,"hide-scrollbars");d(p,"show");cb(!1);qb();history.go(!0===a?-1:-2);Q&&(La.src="");R&&W();N&&xb(N);S&&(S=clearTimeout(S));y&&fb();I&&d(p,I);za&&za()}function xb(a){if(a.g)a.g.appendChild(a),a.g=null;else{var b=a.parentNode;b&&b.removeChild(a);a.src=a.onerror=""}}function hb(a){a&&X();if(1<B){if(1<z)return Hb(z-1);if(G)return Ab(B,!0),Hb(B)}}
function ib(a){a&&X();if(1<B){if(z<B)return Hb(z+1);if(G)return Ab(-1,!0),Hb(1);R&&W()}}function Hb(a){if(a!==z){R?(clearTimeout(R),ub()):X();var b=a>z;z=a;pb(b);return!0}}
function Ib(a){var b=C[z-1],c=b;D={};E&&Object.assign(D,E);Object.assign(D,c.dataset||c);va=D.media;Fa=D.onclick;Ca=D.theme;I=D["class"];Ba=Y("autohide",!0);G=Y("infinite");wa=Y("progress",!0);H=Y("autoslide");Da=Y("preload",!0);Ea=D.buttonHref;Ha=H&&parseFloat(H)||7;y||Ca&&fb(Ca);I&&d(p,I,!0);I&&da(p);if(c=D.control){c="string"===typeof c?c.split(","):c;for(var e=0;e<n.length;e++)D[n[e]]=!1;for(e=0;e<c.length;e++){var f=c[e].trim();"zoom"===f?D["zoom-in"]=D["zoom-out"]=!0:D[f]=!0}}c=D.animation;
Ia=Ja=Ka=!c;J=!1;if(c)for(c="string"===typeof c?c.split(","):c,e=0;e<c.length;e++)f=c[e].trim(),"scale"===f?Ia=!0:"fade"===f?Ja=!0:"slide"===f?Ka=!0:f&&(J=f);Aa=D.fit;e=la&&la.downlink;c=Math.max(pa,u)*ma;e&&1200*e<c&&(c=1200*e);var A;P={media:va,src:ka(b,c,D,va),title:Y("title",b.alt||b.title||(A=b.firstElementChild)&&(A.alt||A.title))};Q&&(La.src=Q="");Da&&a&&(b=C[z])&&(a=b.dataset||b,(A=a.media)&&"image"!==A||(Q=ka(b,c,a,A)));for(b=0;b<n.length;b++)a=n[b],l(q[a],Y(a,ha[a]))}
function pb(a){t=r=0;v=1;if(N)if(N.onerror)xb(N);else{var b=N;setTimeout(function(){b&&N!==b&&(xb(b),b=null)},650);rb();Z()}Ib(a);Ab(z-1);d(Xa,"error");tb(z);m(L);Z();a=P.title;var c=Y("description"),e=Y("button"),f=a||c||e;f&&(a&&(Pa.firstChild.nodeValue=a),c&&(Qa.firstChild.nodeValue=c),e&&(Ra.firstChild.nodeValue=e),l(Pa,a),l(Qa,c),l(Ra,e),g(Oa,"transform","all"===Ba?"":"none"));Ba||d(p,"menu",!0);fa(Oa,f);fa(Sa,G||1<z);fa(Ta,G||z<B);Va.firstChild.nodeValue=1<B?z+" / "+B:"";ya&&ya(z,D)};window.Spotlight={init:ab,theme:fb,fullscreen:cb,download:gb,autofit:V,next:ib,prev:hb,goto:Hb,close:bb,zoom:Gb,menu:Fb,show:function(a,b,c){C=a;b&&(E=b,xa=b.onshow,ya=b.onchange,za=b.onclose,c=c||b.index);nb(c)},play:W,addControl:U,removeControl:function(a){var b=q[a];b&&(Na.removeChild(b),q[a]=null)}};}).call(this);

/*global kakao*/
/* eslint-disable no-unused-vars */
var map1 = {};
var map2 = {};

  /**
   * 지도 초기화 (생성)
   *
   * @param {number} latitude 위도
   * @param {number} longitude 경도
   * @param {string} mapId 지도 표시할 Element ID
   * @param {number} level 지도 확대 레벨
   * @param {map} map 지도 객체 여러 객체를 표시할때 대비하여 옵셔널 파라메터로 받음
   * @return {map}} map object.
   */
function initMap(latitude, longitude, mapId = "map", level = 3, map = map1){
    var container = document.getElementById(mapId);
    var options = {
        center: new kakao.maps.LatLng(latitude, longitude),
        level: level
    };
    map = new kakao.maps.Map(container, options);
    return map;
}

function setCenter(latitude, longitude, map = map1) {            
    // 이동할 위도 경도 위치를 생성합니다 
    var moveLatLon = new kakao.maps.LatLng(latitude, longitude);
    // 지도 중심을 이동 시킵니다
    map.setCenter(moveLatLon);
}

function panTo(map = map1) {
    // 이동할 위도 경도 위치를 생성합니다 
    var moveLatLon = new kakao.maps.LatLng(33.450580, 126.574942);   
    // 지도 중심을 부드럽게 이동시킵니다
    // 만약 이동할 거리가 지도 화면보다 크면 부드러운 효과 없이 이동합니다
    map.panTo(moveLatLon);            
}    
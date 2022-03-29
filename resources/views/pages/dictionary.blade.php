@extends('layouts.app')

  @section('content')
    <div class="whiteSection">
      <div class="mainContainer">
        <div class="contentBlock firstContent">
          <div class="middleContainer">
            <div class="pageHead">
              <div style="color: lightgrey" class="borderedDec lightgrey"></div>
            </div>
            <div class="staticPage">
              <div class="breadcrumbs1">
                <ul>
                  <li>
                    <a href="{{route('home')}}">{{__('main.home')}}</a>
                  </li>
                  <li>
                    {{$lang}}
                  </li>
                </ul>
              </div>
              <div class="staticPageHead">
                <h2 class="title title-28">{{$lang}}</h2>
              </div>
              <div class="staticPageContent">
                <ul class="ul1">
                  @foreach($dictionaries as $item)
                  <li class="li1">
                    <input type="checkbox" checked="">
                    <i style="margin-right: 25px"></i>
                    <h3 style="margin-right: 40px">{{$item->name}}</h3>
                    <p style="text-indent: 0px;  text-align: justify; margin-right: 40px" class="p1">{{$item->description}}</p>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="staticPageFooter">
                <div class="staticPageShareLabel">{{__('main.поделиться')}}:</div>
                <div class="staticPageShareList">
                  <a href="#" class="staticPageFooterBtn"><i class="icon-sn-fb"></i></a>
                  <a href="#" class="staticPageFooterBtn"><i class="icon-vk"></i></a>
                  <a href="#" class="staticPageFooterBtn"><i class="icon-odno"></i></a>
                  <a href="#" class="staticPageFooterBtn"><i class="icon-dotted"></i></a>
                </div>
                <a href="#" id="print" class="staticPageFooterBtn right"><i class="icon-printer"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  @endsection
<style>

  .ul1{
    list-style: none;
    padding: 0;
    margin: 0;

  }
  .ul1 .li1{
    position: relative;
    padding-bottom: 4px;
    padding-top: 18px;
    border-top: 1px solid #dce7eb;
  }
  .ul1 .li1 input[type="checkbox"]{
    position: absolute;
    cursor: pointer;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0;
  }
  .ul1 .li1 i{
    position: absolute;
    transform: translate(-6px,0);
    margin-top: 16px;
    right: 0;
  }
  .ul1 .li1 input[type=checkbox]:checked ~ .p1 {
    margin-top: 0;
    max-height: 0;
    opacity: 0;
    transform: translateX(-50%);
  }

  .ul1 .li1 input[type="checkbox"]:checked~i::before{
    transform: translate(2px,0) rotate(45deg);
  }
  .ul1 .li1 input[type="checkbox"]:checked~i::after{
    transform: translate(-2px,0) rotate(-45deg);
  }
  .ul1 .li1 i::before,.ul1 .li1 i::after{
    content: "";
    position: absolute;
    background: #333;
    width: 3px;
    height: 9px;
  }
  .ul1 .li1 i::before{
    transform: translate(-2px,0)rotate(45deg);
  }
  .ul1 .li1 i:after {
    transform: translate(2px, 0) rotate(-45deg);
  }
  .p1{
    font-size: 16px;
    color: rgba(48,69,92,0.8);
    line-height: 26px;
    letter-spacing: 1px;
    position: relative;
    padding: 0 11px;
    max-height: 800px;
    margin-top: 8px;
    opacity: 1;
    transform: translate(0,0);
    overflow: hidden;
  }
  .transition, .p1, .ul1 .li1 i:before, .ul1 .li1 i:after {
    transition: all 0.25s ease-in-out;

  }
  .flipIn, .ul1 .li1 {
    animation: flipdown 0.5s ease both;
  }
  .ul1 .li1:nth-of-type(1) {
    animation-delay: 0.5s;
  }
  .ul1 .li1:nth-of-type(2) {
    animation-delay: 0.75s;
  }
  .ul1 .li1:nth-of-type(3) {
    animation-delay: 1s;
  }
  .ul1 .li1:last-of-type {
    padding-bottom: 0;
  }

  @keyframes flipdown {
    0% {
      opacity: 0;
      transform-origin: top center;
      transform: rotateX(-90deg);
    }
    5% {
      opacity: 1;
    }
    80% {
      transform: rotateX(8deg);
    }
    83% {
      transform: rotateX(6deg);
    }
    92% {
      transform: rotateX(-3deg);
    }
    100% {
      transform-origin: top center;
      transform: rotateX(0deg);
    }
  }


</style>

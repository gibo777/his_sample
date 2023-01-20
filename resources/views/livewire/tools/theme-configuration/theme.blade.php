<div class="theme-div">
    <div class="container">
            <div class="row">
                <div class="col">
                    <input type="radio" id="defaultMode" name="themeMode" onclick="themeClickColor(this.value);" value="1">
                    &nbsp;<label for="defaultMode">Default Theme </label>
                </div>
                <div class="col">
                    <input type="radio" id="darkMode" name="themeMode" onclick="themeClickColor(this.value);"value="2">
                    &nbsp;<label for="darkMode"><i class="fa-solid fa-moon"></i> Dark Mode </label>
                </div>
            </div>
            <hr>



            {{-- <div class="row">
                <div class="col">
                    <button type="submit" class="btn border-1 btn-danger" id="red">Red</button>
                </div>
                <div class="col">
                    <button type="submit" class="btn border-1 btn-primary" id="blue">Blue</button>
                </div>
                <div class="col">
                    <button type="submit" class="btn border-1 btn-dark" id="black">Black</button>
                </div>
                <div class="col">
                    <button type="submit" class="btn border-1 btn-success" id="green">Green </button>
                </div>
                <div class="col">
                    <button type="submit" class="btn border-1 btn-warning" id="yellow">Yellow </button>
                </div>
            </div> --}}
            <div class="row justify-content-end">
                <div class="col align-self-center text-center">
                    <input type="text" class="border-radius-25 text-center" name="" id="displayofnamecolor"  style="border:1px solid gray;" value="" readonly>
                    <div class="row justify-content-center mt-2">
                        <div id="styleofcolor" class="border-radius-25 align-self-center text-center" style="border:2px solid gray; width:150px; height:150px;">


                        </div>
                    </div>
                </div>
                <div class="col-8 px-0 text-center shadow-lg bg-body overflow-auto">
                    <table class="w-100" id="colortable">
                        <tbody>
                            @for ($i = 0; $i < 19; $i++)
                            <tr style="border:none !important;">
                                @for ($j = 0; $j < 10; $j++)
                                    <td style="background-color: {{$colorsss[$i][$j]->hexcode}};" value="{{$colorsss[$i][$j]->hexcode}}" onclick="selectColor('{{ $colorsss[$i][$j]->id }}','{{$colorsss[$i][$j]->color_level}}');">
                                        {{-- {{$colorsss[$i][$j]->hexcode}} --}}
                                        {{-- {{__('a')}} --}}
                                        <h6 class="user-select-none text-break" id="nameofcolor" style="color: {{$colorsss[$i][$j]->hexcode}};" >{{$colorsss[$i][$j]->hexcode}}</h6>
                                    <td>
                                @endfor
                            </tr>
                        @endfor
                        </tbody>

                    </table>
                </div>
            </div>
            <br />
            <div class="row justify-content-end">
                <div class="col text-end">
                    <button type="submit" class="border-radius-25 btn btn-primary" onclick="apply()">Apply</button>
</div>

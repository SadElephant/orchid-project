<?php

namespace App\Orchid\Screens;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Repository;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ProductsScreen extends Screen
{

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'table'   => [
                new Repository([
                    'id' => 564334,
                    'name' =>"LG UHD 70 Series 43 inch Class 4K Smart UHD TV (42.5'' Diag)",
                    'price' => 329.99,
                    'description' => "The rich 4K displays of LG UHD TVs deliver quality you can see in every scene. Enjoy bright colors, high contrast and impeccable detail.",
                    'created_at' => '01.01.2020',
                    'status' => "disabled",
                    'img' => '/image/products/tv.jpg',
                    'type' => 'TV'
                ]),
                new Repository([
                    'id' => 26464500,
                    'name' =>"Apple 2022 MacBook Air Laptop with M2 chip: 13.6-inch Liquid Retina Display, 8GB RAM, 512GB SSD Storage, Backlit Keyboard, 1080p FaceTime HD Camera. Works with iPhone and iPad; Space Gray AppleCare",
                    'price' => 1600.99,
                    'description' => "STRIKINGLY THIN DESIGN — The redesigned MacBook Air is more portable than ever and weighs just 2.7 pounds. It’s the incredibly capable laptop that lets you work, play or create just about anything — anywhere.
                                    SUPERCHARGED BY M2 — Get more done faster with a next-generation 8-core CPU, up to 10-core GPU and up to 24GB of unified memory.
                                    AppleCare+ for Mac extends your coverage to three years from your AppleCare+ purchase date and adds up to two incidents of accidental damage coverage",
                    'created_at' => '01.01.2020',
                    'status' => "enabled",
                    'img' => '/image/products/mac.jpg',
                    'type' => 'Laptop'
                ]),
                new Repository([
                    'id' => 8678678,
                    'name' =>"Sony DVPSR210P DVD Player",
                    'price' => 33,
                    'description' => "Stylish, ultra-slim, multi-format DVD/CD player
                                    Experience excellent picture quality and solid sound in a compact design. This versatile DVD player featuresfast/slow playback so you don’t miss a word. You can even listen to your favorite CDs or tracks from your MP3 player.",
                    'created_at' => '01.01.2020',
                    'status' => "enabled",
                    'img' => '/image/products/dvd.jpg',
                    'type' => 'Player'
                ]),
                new Repository([
                    'id' => 8767564,
                    'name' =>"Cuisinart SS-15 12-Cup Coffee Maker and Single-Serve Brewer, Stainless Steel with Support Extension",
                    'price' => 132,
                    'description' => "The Coffee Center features a fully automatic 12 cup coffeemaker on one side and a single-serve brewer on the other. Sipping solo or serving a crowd, it’s easy to enjoy the gourmet taste you expect from a Cuisinart coffeemaker. Get the best of both worlds in one appliance!features a fully automatic 12 cup coffeemaker on one side and a single-serve brewer on the other. Sipping solo or serving a crowd, it’s easy to enjoy the gourmet taste you expect from a Cuisinart coffeemaker. Get the best of both worlds in one appliance!",
                    'created_at' => '01.01.2020',
                    'status' => "disabled",
                    'img' => '/image/products/coffe.jpg',
                    'type' => 'Coffeemakers'
                ]),
                new Repository([
                    'id' => 395290,
                    'name' =>"SAMSUNG 32-Inch Class QLED Q60A Series - 4K UHD Dual LED Quantum HDR Smart TV with Alexa Built-in (QN32Q60AAFXZA, 2021 Model)",
                    'price' => 329.99,
                    'description' => 'Enjoy ultra-intense 4K vivid color and sharpened clarity with the Q60A/Q60AB. It combines Quantum Dot Technology with the power of 100% Color Volume¹ to deliver a billion of shades for colorful, razor-sharp visuals. The ultra-smart Quantum Processor 4K Lite automatically upscales and transforms your content into 4K. Dual LED² backlighting adjusts and coordinates with content in real time to enhance contrast and detail. Plus, with the rechargeable SolarCellRemote, you can easily access and control Smart TV and all your connected devices. ¹QLED televisions can produce 100% Color Volume in the DCI-P3 color space, the format for most cinema screens and HDR movies for television. ²32" Dual LED not available.',
                    'created_at' => '01.01.2020',
                    'status' => "enabled",
                    'img' => '/image/products/tv.jpg',
                    'type' => 'TV'
                ]),

            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Example screen';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Sample Screen Components';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            Button::make('Show toast')
                ->method('showToast')
                ->novalidate()
                ->icon('bag'),

            ModalToggle::make('Launch demo modal')
                ->modal('exampleModal')
                ->method('showToast')
                ->icon('full-screen'),

            Button::make('Export file')
                ->method('export')
                ->icon('cloud-download')
                ->rawClick()
                ->novalidate(),

            DropDown::make('Dropdown button')
                ->icon('folder-alt')
                ->list([

                    Button::make('Action')
                        ->method('showToast')
                        ->icon('bag'),

                    Button::make('Another action')
                        ->method('showToast')
                        ->icon('bubbles'),

                    Button::make('Something else here')
                        ->method('showToast')
                        ->icon('bulb'),

                    Button::make('Confirm button')
                        ->method('showToast')
                        ->confirm('If you click you will see a toast message')
                        ->novalidate()
                        ->icon('shield'),
                ]),

        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [

            Layout::table('table', [
                TD::make('id', 'ID')
                    ->width('50'),

                TD::make('image', 'Image')
                    ->width('260')
                    ->render(fn (Repository $model) => // Please use view('path')
                    "<img src='{$model->get('img')}'
                              alt='sample'
                              class='mw-100 d-block img-fluid rounded-1 w-100'>"),

                TD::make('name', 'Name')
                    ->width('255')
                    ->render(fn (Repository $model) => Str::limit($model->get('name'), 200)),

                TD::make('description', 'Description')
                    ->width('330')
                    ->render(fn (Repository $model) => Str::limit($model->get('description'), 550)),

                TD::make('type', 'Category')
                    ->width('70'),

                TD::make('status', 'Status')
                    ->width('70'),

                TD::make('price', 'Price')
                    ->width('75'),

                TD::make('created_at', 'Created')
                    ->width('70'),
            ]),

            Layout::modal('exampleModal', Layout::rows([
                Input::make('toast')
                    ->title('Messages to display')
                    ->placeholder('Hello world!')
                    ->help('The entered text will be displayed on the right side as a toast.')
                    ->required(),
            ]))->title('Create your own toast message'),
        ];
    }

    /**
     * @param Request $request
     */
    public function showToast(Request $request): void
    {
        Toast::warning($request->get('toast', 'Hello, world! This is a toast message.'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function export()
    {
        return response()->streamDownload(function () {
            $csv = tap(fopen('php://output', 'wb'), function ($csv) {
                fputcsv($csv, ['header:col1', 'header:col2', 'header:col3']);
            });

            collect([
                ['row1:col1', 'row1:col2', 'row1:col3'],
                ['row2:col1', 'row2:col2', 'row2:col3'],
                ['row3:col1', 'row3:col2', 'row3:col3'],
            ])->each(function (array $row) use ($csv) {
                fputcsv($csv, $row);
            });

            return tap($csv, function ($csv) {
                fclose($csv);
            });
        }, 'File-name.csv');
    }
}

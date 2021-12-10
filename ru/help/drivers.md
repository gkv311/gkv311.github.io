---
layout: post
title: Стереодрайверы для игр
publish_date: 2011-06-15
categories: ru help
permalink: /ru/help/drivers/
---

<style>
table {
  border-collapse: separate;
}
td {
  padding: 5px;
}
</style>

Первые игры со встроенной поддержкой вывода стереоизображения появились очень давно (вспомнить хотя бы Descent).
Тем не менее, большинство современных игр по-прежнему игнорируют существование 3D стерео.
Для решения этой проблемы были разработаны приложения особого класса - 'стереодрайвер', позволяющий адаптировать игру под стереодисплей.


## Введение

Стереопара представляет собой два изображения, созданные с небольшим сдвигом камеры.
Обычное 3D приложение рисует картинку для одного ракурса камеры, при этом камера задаётся с помощью матрицы проекции 4x4.
Матрично-векторные операции являются основой вычислений в 3D графике, более того - в графических API Direct3D и OpenGL матрицы проекции задавались отдельными методами.
Поскольку большинство приложений используют матрицы проекции стандартной формы, камеру можно переопределить непосредственно модифицируя матрицу проекции.

Собственно говоря, именно этим и занимается любой стереодрайвер - он достраивает за игру дополнительный кадр, переопределяя матрицы проекции.
Однако не всё так просто, как может показаться на первый взгляд:

1. Подготовка стереопары практически удваивает вычисления на каждый кадр, что приводит к падению производительности.
2. Современные приложения имеют большую свободу в задании вычислений и используют хитрые алгоритмы для отрисовки теней и спецэффектов с использованием внеэкранных буферов кадра.
   Это значительно осложняет логику стереодрайвера, требуя ручной адаптации под особенности конкретного приложения.
   Очень часто стереодрайвер неспособен отработать корректно некоторые спецэффекты в игре, что делает изображение бракованным.
   Наиболее распространены проблемы с тенями и небом.
3. Подготовленную стереопару необходимо вывести на соответствующее стереооборудование, которое весьма разнообразно.
   Иногда поддержка конкретного оборудования технически невозможна стереодрайвером или не реализуется производителем с целью продвижения своих решений.

К сожалению, на сегодняшний день выбора между производителями стереодрайверов практически нет.
В приведённой ниже таблице перечислены существовавшие в прошлом решения, а также их сравнительные характеристики.

## Сводная таблица

<table width='80%'><tbody>
<tr>
   <td><p>  </p></td>

   <td bgcolor="#d6d6d6" align="center"><b>NVIDIA, WinXP</b></td>
   <td bgcolor="#d6d6d6" align="center"><b>NVIDIA 3D Vision</b></td>
   <td bgcolor="#d6d6d6" align="center"><b>IZ3D</b></td>
   <td bgcolor="#d6d6d6" align="center"><b>OPEN STEREO</b></td>
   <td bgcolor="#d6d6d6" align="center"><b>eDimensional</b></td>
   <td bgcolor="#d6d6d6" align="center"><b>TriDef</b></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Статус разработки:</b></i></td>

    <td align="center"><span style="color: red;">прекращена</span></td>
    <td align="center">постоянно<br>обновляется</td>
    <td align="center"><span style="color: red;">прекращена</span></td>
    <td align="center"><span style="color: red;">прекращена</span></td>
    <td align="center"><span style="color: red;">прекращена</span></td>
    <td align="center">постоянно<br>обновляется</td>
</tr>
<tr>
    <td colspan="7" height="24" bgcolor="#d6d6d6"><b>Поддерживаемые Операционные системы</b></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Windows XP x86:</b></i></td>

    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>Windows XP x86-64:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Windows Vista / 7 x86:</b></i></td>

    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>Windows Vista x86-64:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Windows 7 x86-64:</b></i></td>

    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>32-битные приложения:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>64-битные приложения:</b></i></td>

    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span> (?)</td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td colspan="7" height="24" bgcolor="#d6d6d6"><b>Поддерживаемые 3D API</b></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>DirectX 7:</b></i></td>

    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span><br>(<a href="javascript:void(0);" title="первые релизы поддерживали">info</a>)</td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>DirectX 8:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span><br>(<a href="javascript:void(0);" title="через D3D8 -> D3D9 wrapper">info</a>)</td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>DirectX 9c:</b></i></td>

    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>DirectX 10:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>OpenGL:</b></i></td>

    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Поддержка оконного стерео:</b></i></td>

    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span><br>(<a href="javascript:void(0);" title="избранные приложения могут работать в оконном режиме">info</a>)</td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>Автоматический перехват 3D-приложений:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span><br>(<a href="javascript:void(0);" title="необходимо создавать специальные ярлыки запуска для каждого приложения">info</a>)</td>
</tr>
<tr>
    <td colspan="7" height="24" bgcolor="#d6d6d6"><b>Поддерживаемые стереоустройства</b></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Анаглиф:</b><br>(Red-Cyan anaglyph)</i></td>

    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>NVIDIA 3DVision:</b></i></td>

    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>Затворные очки<br>(других производителей):</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: orange;">+/-</span><br>(AMD HD3D, software emulation)</td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">+/-</span><br>(частичная)</td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: orange;">+/-</span><br>(AMD HD3D)</td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>Чересстрочный монитор</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Монитор Sharp:</b></i></td>

    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center">?</td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>HMD Z800:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center">- </td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Vuzix VR920:</b></i></td>

    <td align="center">?</td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>Двойной вывод:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Зеркальные вывод:</b></i></td>

    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: green;">+</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>Монитор IZ3D:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span><br>(<a href="javascript:void(0);" title="только последние релизы">info</a>)</td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: green;">+</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
    <td bgcolor="#e0e0e0" align="center"><span style="color: red;">-</span></td>
</tr>
<tr>
    <td colspan="7" height="24" bgcolor="#d6d6d6"><b>Дополнительно</b></td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>Официальный сайт:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><a href="https://www.nvidia.ru" title="nvidia.ru" >nvidia.ru</a></td>
    <td bgcolor="#e0e0e0" align="center"><a href="https://www.nvidia.ru" title="nvidia.ru" >nvidia.ru</a></td>
    <td bgcolor="#e0e0e0" align="center"><a href="https://www.iz3d.com" title="iz3d.com" >iz3d.com</a></td>
    <td bgcolor="#e0e0e0" align="center"><a href="https://kinddragon.blogspot.com" title="kinddragon.blogspot.com" >blogspot.com</a></td>
    <td bgcolor="#e0e0e0" align="center"><a href="https://www.edimensional.com" title="edimensional.com" >edimensional.com</a></td>
    <td bgcolor="#e0e0e0" align="center"><a href="https://www.tridef.com" title="tridef.com" >tridef.com</a></td>
</tr>
<tr>
    <td bgcolor="#e7e7e7" align="right"><i><b>Последняя официальная версия:</b><br>(на момент написания статьи)</i></td>

    <td align="center">91.31<br>(2006.06.29)</td>
    <td align="center">-</td>
    <td align="center">1.13RC<br>(2011.06.15)</td>
    <td align="center">0.3b<br>(2007.04.26)</td>
    <td align="center"><span style="color: red;">-</span></td>
    <td align="center">-</td>
</tr>
<tr>
    <td bgcolor="#e0e0e0" align="right"><i><b>Download:</b></i></td>

    <td bgcolor="#e0e0e0" align="center"><a href="https://www.nvidia.com/object/3dstereo_drivers.html" >nvidia.ru</a></td>
    <td bgcolor="#e0e0e0" align="center"><a href="https://www.nvidia.ru/Download/index.aspx?lang=ru" >nvidia.ru</a></td>
    <td bgcolor="#e0e0e0" align="center"></td>
    <td bgcolor="#e0e0e0" align="center"><a href="https://kinddragon.blogspot.com/2007/04/blog-post_28.html" >RealStereo 0.3b</a></td>
    <td bgcolor="#e0e0e0" align="center"></td>
    <td bgcolor="#e0e0e0" align="center"><a href="https://www.tridef.com/download/latest.html">tridef.com</a></td>
</tr>
</tbody></table>

<br/>

## Дополнительные подробности

<div align='center'><a href="https://www.nvidia.ru" title="NVIDIA 3D стереодрайвер для Win"><img src='/files/nvidia3d.png' width='488' height='128' border='0' alt='NVIDIA стереодрайвер' /></a></div>
Стереодрайвер NVIDIA можно и любить и ненавидеть одновременно.
Это один из самых старых представителей, который оставался бескомпромиссным вариантом для стереолюбителя на протяжении многих лет.

Основная проблема драйвера - это отсутствие конкретной линии разработки.
Выпуски драйверов для Windows XP были крайне редкими и к сожалению очень редко радовали игроков качественными нововведениями.
На версии 91.31 NVIDIA решила прекратить дальнейшую разработку этого драйвера.

Однако в 2008 году NVIDIA выдвигает собственный продукт для стерео - это 'старые добрые' затворные очки, но теперь под брендом NVIDIA.
Производитель продвигает новый товар в купе с новыми драйверами - это фактически те же самые наработки в области стерео, но уже для Windows Vista!
Помимо сменившегося интерфейса настроек, урезанного до минимума списка поддерживаемых стереоустройств (только анаглифные очки, фирменные затворные очки и мониторы Zalman),
драйвер также лишился и дружбы с OpenGL играми. В более поздних релизах незаметно пропала поддержка игр на DirectX 7.

Такое перевоплощение не очень то порадовало пользователей старых стереоустройствами, которые в миг потеряли всякую надежду на поддержку в Vista+.

Однако с момента перевоплощения многое изменилось в лучшую сторону.
В первую очередь это касается сроков выпуска - стереодрайвер теперь включён в поставку основного драйвера
(чего так долго ждали со времён драйвера для Windows XP), а значит нет проблем обновления различных компонентов.
Изменилась панель настроек стереодрайвера, а также туториал для его активации.
Появился OSD (On-Screen-Display), который выводит некоторые сведения о работе драйвера на экран прямо во время игры.
Некоторые настройки (конвергенции) были перенесены в разряд 'продвинутых' и по-умолчанию не доступны для настройки. Компания стала активно сотрудничать с разработчиками игр с целью поддержки ими стереовывода средствами стереодрайвера. В результате вышло уже несколько игр, полностью совместимых со стереотехнологией NVIDIA, но с неприятным сюрпризом для опытных игроков - невозможностью регулировать параметр конвергенции (авторы выбрали 'подходящее' значение за вас).</p>

<div align='center'><a href="https://iz3d.com" title="iZ3D 3D стереодрайвер"><img src='/files/iz3ddriver.png' width='275' height='107' border='0' alt='iZ3D 3D стереодрайвер' /></a></div>

**Историческая заметка - разработчик стереодрайвера, к сожалению, объявил себя банкротом в 2012 году**.
Выход "новичка" на рынок стереоустройств подарил не только весьма доступный по цене монитор, но и стереодрайвер собственной разработки.
Основной упор драйвера - это поддержка современных игр со включенными спецэффектами.
В последствии к поддержке IZ3D мониторов была добавлена поддержка и иных стереоустройств, на платной основе.

<div align='center'><a href="https://kinddragon.blogspot.com/" title="Stereo Driver OPEN STEREO"><b>Stereo Driver OPEN STEREO</b></a></div>

Программа вышла в начале 2007 года и сразу же вызвала большой интерес у стереосообщества.
Автор программы, Аркадий Шапкин, написал его для вывода игр в анаглифном стереоформате.
В основе программы используется бесплатная версия библиотек для перехвата вызовов.
Принцип работы программы основывается на перехвате команд видеодрайверу, добавления к ним новых команд для вывода стерео.

К сожалению, драйвер закончил своё развитие практически в самом начале, так как автора "забрали" в команду разработчиков iZ3D, где он и использовал свои знания и умения на благо уже iZ3D драйвера.
Тем не менее информация об этой программе оставлена здесь для истории.

<div align='center'><a href="https://www.tridef.com/ignition/overview.html" title="TriDef Ignition"><img src='/files/logos/tridef_logo.png' border='0' alt='TriDef Ignition стереодрайвер' /></a><b>TriDef Ignition</b></div>

В недавнем прошлом стереодрайвер этого разработчика продавался отдельно для каждой игры.
Это была любопытная идея (ведь покупатель мог быть уверен в 100%-ой работоспособности стерео в игре при покупке),
но конкуренция со стороны других производителей драйверов вынудила TriDef выпустить универсальный драйвер.

В списке поддерживаемых драйвером устройств значатся анаглиф, чересстрочные мониторы, AMD HD3D и некоторые другие.
Программа платная, однако драйвер также поставляется со многими стереомониторами.

Особенности использования драйвера вытекают из его прошлого.
Для каждой установленной игры необходимо создать ярлык запуска - никакого автоматического перехвата всех 3D-приложений как в NVIDIA 3D Vision и iZ3D не предусмотрено.
Компенсирует неудобство функция обнаружения установленных программ.

К каждой игре необходимо указать профиль.
Очень интересным способом решаются проблемы некоторых игр - эффекты, которые не удаётся адаптировать под стерео, отключаются независимо от настроек приложения.

Из приятных особенностей драйвера следует отметить самый продвинутое OSD меню, позволяющее менять все настройки драйвера не выходя из игры.

<br/>

<div align='right'><b>Trademarks</b>
<i>The name NVIDIA and the NVIDIA logo are registered trademarks of NVIDIA Corporation.
AMD, the AMD Arrow logo, and combinations thereof, are trademarks of Advanced Micro Devices, Inc.</i></div>

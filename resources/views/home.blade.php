<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nova — Experiencias digitales extraordinarias</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					animation: { 'float': 'float 6s ease-in-out infinite', 'pulse-slow': 'pulse 4s ease-in-out infinite' },
					keyframes: { float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-18px)' } } }
				}
			}
		}
	</script>
</head>
<body class="overflow-x-hidden bg-slate-950 text-white antialiased">
	<div class="fixed inset-0 -z-10 overflow-hidden">
		<div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-fuchsia-600/25 blur-3xl"></div>
		<div class="absolute right-0 top-1/3 h-96 w-96 rounded-full bg-cyan-500/20 blur-3xl"></div>
		<div class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-violet-600/20 blur-3xl"></div>
	</div>

	<nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-7 lg:px-8">
		<a href="#" class="flex items-center gap-3 text-xl font-black tracking-tight"><span class="grid h-10 w-10 place-items-center rounded-2xl bg-gradient-to-br from-cyan-400 to-fuchsia-500 shadow-lg shadow-fuchsia-500/25">✦</span> NOVA</a>
		<div class="hidden items-center gap-8 text-sm text-slate-300 md:flex"><a href="#soluciones" class="transition hover:text-white">Soluciones</a><a href="#proceso" class="transition hover:text-white">Proceso</a><a href="#contacto" class="transition hover:text-white">Contacto</a></div>
		<a href="#contacto" class="rounded-full border border-white/20 bg-white/10 px-5 py-2.5 text-sm font-semibold backdrop-blur transition hover:bg-white hover:text-slate-950">Hablemos <span class="ml-1">↗</span></a>
	</nav>

	<main>
		<section class="mx-auto grid max-w-7xl items-center gap-16 px-6 pb-24 pt-16 lg:grid-cols-2 lg:px-8 lg:pb-36 lg:pt-24">
			<div>
				<div class="mb-7 inline-flex items-center gap-2 rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-2 text-sm text-cyan-200"><span class="h-2 w-2 animate-pulse rounded-full bg-cyan-300"></span> Diseñamos lo extraordinario</div>
				<h1 class="max-w-3xl text-5xl font-black leading-[.95] tracking-tight sm:text-7xl">Ideas que se convierten en <span class="bg-gradient-to-r from-cyan-300 via-violet-400 to-fuchsia-400 bg-clip-text text-transparent">impacto.</span></h1>
				<p class="mt-8 max-w-xl text-lg leading-8 text-slate-300">Creamos experiencias digitales memorables para marcas que no quieren pasar desapercibidas. Estrategia, diseño y tecnología en un solo lugar.</p>
				<div class="mt-10 flex flex-wrap gap-4"><a href="#contacto" class="rounded-full bg-white px-7 py-4 font-bold text-slate-950 shadow-2xl shadow-cyan-500/20 transition hover:-translate-y-1">Empezar un proyecto <span class="ml-2">→</span></a><a href="#soluciones" class="rounded-full border border-white/20 px-7 py-4 font-bold transition hover:border-white/50 hover:bg-white/10">Explorar servicios</a></div>
				<div class="mt-12 flex items-center gap-5 text-sm text-slate-400"><div class="flex -space-x-3"><span class="grid h-10 w-10 place-items-center rounded-full border-2 border-slate-950 bg-cyan-400 text-slate-950">M</span><span class="grid h-10 w-10 place-items-center rounded-full border-2 border-slate-950 bg-fuchsia-400 text-slate-950">L</span><span class="grid h-10 w-10 place-items-center rounded-full border-2 border-slate-950 bg-violet-400 text-slate-950">A</span></div><span><strong class="text-white">+120 equipos</strong><br>ya están creciendo con Nova</span></div>
			</div>
			<div class="relative mx-auto w-full max-w-lg animate-float">
				<div class="absolute -inset-8 rounded-[3rem] bg-gradient-to-r from-cyan-500/20 to-fuchsia-500/20 blur-2xl"></div>
				<div class="relative rounded-[2rem] border border-white/20 bg-white/10 p-3 shadow-2xl shadow-fuchsia-500/20 backdrop-blur-xl">
					<div class="rounded-[1.5rem] bg-gradient-to-br from-slate-800 via-violet-950 to-slate-900 p-8">
						<div class="mb-20 flex items-center justify-between"><span class="text-sm text-slate-400">NOVA / 2024</span><span class="rounded-full bg-white/10 px-3 py-1 text-xs text-cyan-200">LIVE ✦</span></div>
						<div class="mb-8 text-6xl font-black tracking-tighter">+248<span class="text-cyan-300">%</span></div><p class="text-slate-400">Crecimiento promedio</p>
						<div class="mt-10 flex h-24 items-end gap-2"><span class="h-1/4 flex-1 rounded-t-lg bg-cyan-300/30"></span><span class="h-2/5 flex-1 rounded-t-lg bg-cyan-300/50"></span><span class="h-1/2 flex-1 rounded-t-lg bg-violet-400/60"></span><span class="h-3/4 flex-1 rounded-t-lg bg-fuchsia-400/80"></span><span class="h-full flex-1 rounded-t-lg bg-gradient-to-t from-cyan-300 to-fuchsia-400"></span></div>
					</div>
				</div>
				<div class="absolute -right-8 -top-8 rounded-2xl border border-white/20 bg-slate-900/80 p-4 shadow-xl backdrop-blur-xl"><div class="text-2xl">✺</div><div class="mt-1 text-xs text-slate-400">Creatividad</div></div>
			</div>
		</section>

		<section id="soluciones" class="mx-auto max-w-7xl px-6 py-24 lg:px-8"><div class="mb-14 max-w-2xl"><p class="mb-4 font-semibold uppercase tracking-[.25em] text-cyan-300">Todo lo que necesitas</p><h2 class="text-4xl font-black tracking-tight sm:text-5xl">De la primera idea al <span class="text-slate-500">gran resultado.</span></h2></div><div class="grid gap-5 md:grid-cols-3"><div class="group rounded-3xl border border-white/10 bg-white/[.06] p-8 transition hover:-translate-y-2 hover:border-cyan-300/40"><div class="mb-14 text-4xl">◈</div><h3 class="text-2xl font-bold">Estrategia</h3><p class="mt-4 leading-7 text-slate-400">Convertimos desafíos complejos en oportunidades claras y accionables.</p></div><div class="group rounded-3xl border border-white/10 bg-white/[.06] p-8 transition hover:-translate-y-2 hover:border-fuchsia-300/40"><div class="mb-14 text-4xl">✦</div><h3 class="text-2xl font-bold">Diseño</h3><p class="mt-4 leading-7 text-slate-400">Interfaces que conectan, emocionan y hacen que cada interacción cuente.</p></div><div class="group rounded-3xl border border-white/10 bg-white/[.06] p-8 transition hover:-translate-y-2 hover:border-violet-300/40"><div class="mb-14 text-4xl">⌁</div><h3 class="text-2xl font-bold">Tecnología</h3><p class="mt-4 leading-7 text-slate-400">Soluciones robustas, veloces y listas para acompañar tu evolución.</p></div></div></section>

		<section id="contacto" class="mx-6 mb-20 rounded-[2rem] bg-gradient-to-r from-cyan-400 to-violet-500 p-px lg:mx-auto lg:max-w-7xl"><div class="rounded-[2rem] bg-slate-950 px-8 py-16 text-center sm:px-16"><h2 class="text-4xl font-black sm:text-5xl">¿Creamos algo increíble?</h2><p class="mx-auto mt-5 max-w-xl text-slate-400">Tu próximo gran proyecto empieza con una conversación.</p><a href="mailto:hola@nova.demo" class="mt-8 inline-block rounded-full bg-white px-8 py-4 font-bold text-slate-950 transition hover:scale-105">hola@nova.demo&nbsp; ↗</a></div></section>
	</main>
	<footer class="border-t border-white/10 px-6 py-8 text-center text-sm text-slate-500">© {{ date('Y') }} Nova Studio. Hecho para destacar.</footer>
</body>
</html>

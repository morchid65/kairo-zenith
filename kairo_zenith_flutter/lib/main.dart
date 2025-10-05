import 'package:flutter/material.dart';
import 'package:audioplayers/audioplayers.dart';

void main() => runApp(KairoZenithApp());

class KairoZenithApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Kairo Zenith',
      theme: ThemeData.dark(),
      home: RitualPage(),
    );
  }
}

class RitualPage extends StatefulWidget {
  @override
  _RitualPageState createState() => _RitualPageState();
}

class _RitualPageState extends State<RitualPage> {
  final AudioPlayer _player = AudioPlayer();
  bool _isPlaying = false;

  void _triggerRitual() async {
    setState(() => _isPlaying = true);
    await _player.play(AssetSource('audio/nada_nada.mp3'));
    _player.onPlayerComplete.listen((event) {
      setState(() => _isPlaying = false);
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.black,
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text('✨ Activation du Rituel ✨', style: TextStyle(fontSize: 24)),
            SizedBox(height: 40),
            AnimatedOpacity(
              opacity: _isPlaying ? 1.0 : 0.0,
              duration: Duration(seconds: 1),
              child: Text('⟁', style: TextStyle(fontSize: 100, color: Colors.purpleAccent)),
            ),
            SizedBox(height: 40),
            ElevatedButton(
              onPressed: _isPlaying ? null : _triggerRitual,
              child: Text('Déclencher Nada Nada'),
            ),
          ],
        ),
      ),
    );
  }
}
